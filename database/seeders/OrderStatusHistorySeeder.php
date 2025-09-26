<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_status_history')->delete();

        $orderIds = DB::table('orders')
            ->whereIn('order_number', ['ORD-20250924001','ORD-20250924002','ORD-20250924003'])
            ->pluck('id', 'order_number');

        if ($orderIds->isEmpty()) return;

        $o1 = $orderIds['ORD-20250924001'] ?? null;
        $o2 = $orderIds['ORD-20250924002'] ?? null;
        $o3 = $orderIds['ORD-20250924003'] ?? null;

        $histories = [];
        if ($o1) {
            $histories[] = ['order_id'=>$o1,'from_status_id'=>null,'to_status_id'=>1,'changed_by'=>1,'note'=>'Order dibuat oleh user','created_at'=>now()->subDays(7)];
            $histories[] = ['order_id'=>$o1,'from_status_id'=>1,'to_status_id'=>2,'changed_by'=>1,'note'=>'Pembayaran diterima','created_at'=>now()->subDays(6)];
            $histories[] = ['order_id'=>$o1,'from_status_id'=>2,'to_status_id'=>3,'changed_by'=>2,'note'=>'Order diproses oleh admin','created_at'=>now()->subDays(5)];
        }
        if ($o2) {
            $histories[] = ['order_id'=>$o2,'from_status_id'=>null,'to_status_id'=>1,'changed_by'=>2,'note'=>'Order dibuat oleh user','created_at'=>now()->subDays(4)];
            $histories[] = ['order_id'=>$o2,'from_status_id'=>1,'to_status_id'=>2,'changed_by'=>2,'note'=>'Pembayaran COD, status menunggu konfirmasi','created_at'=>now()->subDays(3)];
        }
        if ($o3) {
            $histories[] = ['order_id'=>$o3,'from_status_id'=>null,'to_status_id'=>1,'changed_by'=>1,'note'=>'Order dibuat oleh user','created_at'=>now()->subDays(5)];
            $histories[] = ['order_id'=>$o3,'from_status_id'=>1,'to_status_id'=>2,'changed_by'=>1,'note'=>'Pembayaran e-wallet diterima','created_at'=>now()->subDays(4)];
            $histories[] = ['order_id'=>$o3,'from_status_id'=>2,'to_status_id'=>3,'changed_by'=>2,'note'=>'Order diproses oleh admin','created_at'=>now()->subDays(3)];
            $histories[] = ['order_id'=>$o3,'from_status_id'=>3,'to_status_id'=>4,'changed_by'=>2,'note'=>'Order dikirim ke alamat tujuan','created_at'=>now()->subDays(2)];
            $histories[] = ['order_id'=>$o3,'from_status_id'=>4,'to_status_id'=>5,'changed_by'=>1,'note'=>'Order sudah diterima oleh user','created_at'=>now()->subDay()];
        }

        foreach ($histories as $h) {
            DB::table('order_status_history')->insert($h);
        }
    }
}
