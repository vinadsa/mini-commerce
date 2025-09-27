@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    <aside class="w-48 bg-purple-100 min-h-screen p-4">
        <nav>
            <ul class="space-y-4">
                <li><a href="#" class="font-semibold text-purple-800 border-b-2 border-purple-800">Pesanan</a></li>
                <li><a href="#">Pengiriman</a></li>
                <li><a href="#">Produk</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main -->
    <main class="flex-1 p-6 bg-white rounded-lg shadow ml-4">
        <h2 class="text-xl font-semibold mb-4">Pesanan Saya</h2>

        <!-- Tabs -->
        <div class="space-x-3 mb-4">
            <button class="hover:text-pink-500">Semua</button>
            <button>Belum Bayar</button>
            <button>Perlu Dikirim</button>
            <button>Dikirim</button>
            <button>Selesai</button>
            <button>Pengembalian/Pembatalan</button>
        </div>

        <div class="flex items-center gap-3 mb-4">
            <span class="font-medium">Status Pesanan:</span>
            <button class="border px-3 py-1 rounded-full">Semua</button>
            <button class="border px-3 py-1 rounded-full">Perlu diproses</button>
            <button class="border px-3 py-1 rounded-full">Telah diproses</button>
        </div>

        <div class="flex gap-3 mb-4">
            <input type="text" placeholder="No. Pesanan" class="border px-2 py-1 rounded">
            <select class="border px-2 py-1 rounded">
                <option>Jasa Kirim</option>
                <option>SiCepat Reg</option>
                <option>JNE</option>
                <option>Pos Indonesia</option>
            </select>
        </div>

        <p class="font-bold mb-2">1 Paket</p>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-purple-200 text-left">
                    <th class="p-2">Produk</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Jasa Kirim</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="flex items-center gap-2 p-2">
                        <input type="checkbox">
                        <img src="https://via.placeholder.com/80x80?text=Tshirt" class="rounded">
                    </td>
                    <td class="p-2">Telah diproses</td>
                    <td class="p-2">SiCepat Reg</td>
                </tr>
            </tbody>
        </table>
    </main>
</div>
@endsection
