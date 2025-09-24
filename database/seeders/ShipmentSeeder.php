<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Reset tabel shipments (aman untuk development)
        DB::table('shipments')->delete();

        // Ambil orders yang dicreate oleh OrdersSeeder
        $orders = DB::table('orders')
            ->whereIn('order_number', [
                'ORD-20250924001',
                'ORD-20250924002',
                'ORD-20250924003',
            ])->get()->keyBy('order_number');

        if ($orders->isEmpty()) {
            return;
        }

        $orderIds = $orders->pluck('id')->all();

        // Ambil payment per order_id (PaymentsSeeder masih memakai 'paid'/'pending' dsb)
        $payments = DB::table('payments')
            ->whereIn('order_id', $orderIds)
            ->get()
            ->keyBy('order_id');

        // Ambil mapping status -> nama status (OrderStatusSeeder menggunakan bahasa Indonesia)
        $orderStatuses = DB::table('order_statuses')->pluck('name', 'id');

        // Hitung jumlah item per order
        $itemsCount = DB::table('order_items')
            ->selectRaw('order_id, COUNT(*) as cnt')
            ->whereIn('order_id', $orderIds)
            ->groupBy('order_id')
            ->get()
            ->keyBy('order_id');

        // Nilai enum di migration shipments (bahasa Indonesia, persis seperti migration)
        $enumAllowed = [
            'Menunggu Pengiriman',
            'Sedang Dikirim',
            'Dalam Perjalanan',
            'Sudah Diterima',
            'Dikembalikan',
        ];

        $carriers = ['JNE', 'J&T', 'SiCepat', 'POS', 'TIKI'];
        $inserts = [];

        foreach ($orders as $orderNumber => $order) {
            $orderId = $order->id;
            $count = $itemsCount->get($orderId)->cnt ?? 0;

            // Tidak buat shipment jika tidak ada item
            if ($count <= 0) {
                continue;
            }

            $payment = $payments->get($orderId);
            $isPaid = $payment && isset($payment->status) && strtolower($payment->status) === 'paid';

            $statusId = (int) ($order->status_id ?? 0);
            $statusName = $orderStatuses->get($statusId) ?? '';

            // Proses jika sudah dibayar atau order berada pada tahap proses/pengiriman
            $isProcessable = $isPaid || $statusId >= 3 || in_array($statusName, ['Sudah Dibayar', 'Sedang Diproses', 'Sedang Dikirim', 'Sudah Diterima']);

            if (! $isProcessable) {
                continue;
            }

            // Pilih carrier dan buat tracking number
            $carrier = $carriers[array_rand($carriers)];
            $tracking = strtoupper($carrier) . '-' . strtoupper(Str::random(10));

            // Tentukan status shipment (bahasa Indonesia) berdasarkan kombinasi payment & order status
            if ($statusName === 'Sudah Diterima' || $statusId >= 5) {
                $shipStatus = 'Sudah Diterima';
            } elseif ($statusName === 'Sedang Dikirim' || $statusId === 4) {
                $shipStatus = 'Sedang Dikirim';
            } elseif ($isPaid && Str::endsWith($orderNumber, '001')) {
                $shipStatus = 'Dalam Perjalanan';
            } elseif ($isPaid || $statusId >= 3) {
                $shipStatus = 'Sedang Dikirim';
            } else {
                $shipStatus = 'Menunggu Pengiriman';
            }

            // Pastikan nilai yang disimpan sesuai enum migration
            if (! in_array($shipStatus, $enumAllowed)) {
                $shipStatus = 'Menunggu Pengiriman';
            }

            // Tentukan waktu_dikirim untuk contoh data
            if ($shipStatus === 'Sudah Diterima') {
                $waktuDikirim = $now->copy()->subDays(6);
            } elseif ($shipStatus === 'Dalam Perjalanan') {
                $waktuDikirim = $now->copy()->subDays(3);
            } elseif ($shipStatus === 'Sedang Dikirim') {
                $waktuDikirim = $now->copy()->subDays(1);
            } else {
                $waktuDikirim = null;
            }

            $inserts[] = [
                'order_id' => $orderId,
                'carrier' => $carrier,
                'tracking_number' => $tracking,
                'status' => $shipStatus,
                'waktu_dikirim' => $waktuDikirim,
            ];
        }

        if (! empty($inserts)) {
            DB::table('shipments')->insert($inserts);
        }
    }
}
