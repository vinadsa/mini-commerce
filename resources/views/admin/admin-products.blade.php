@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    <aside class="w-48 bg-purple-100 min-h-screen p-4">
        <nav>
            <ul class="space-y-4">
                <li><a href="#">Pesanan</a></li>
                <li><a href="#">Pengiriman</a></li>
                <li><a href="#" class="font-semibold text-purple-800 border-b-2 border-purple-800">Produk</a></li>
            </ul>
        </nav>
    </aside>

    <main class="flex-1 p-6 bg-white rounded-lg shadow ml-4">
        <h2 class="text-xl font-semibold mb-4">Produk Saya</h2>

        <div class="flex gap-3 mb-4">
            <button class="bg-red-400 text-white px-3 py-1 rounded">Hapus</button>
            <button class="bg-blue-400 text-white px-3 py-1 rounded">Edit</button>
            <button class="bg-purple-400 text-white px-3 py-1 rounded">+ Tambah Produk</button>
        </div>

        <div class="flex gap-3 border-b mb-4">
            <button class="pb-2 border-b-2 border-purple-500 font-semibold">Semua</button>
            <button class="pb-2">Tambah Stok</button>
        </div>

        <p class="font-bold mb-2">1 Produk</p>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-purple-200 text-left">
                    <th class="p-2">Produk</th>
                    <th class="p-2">Penjualan</th>
                    <th class="p-2">Harga</th>
                    <th class="p-2">Stok</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="flex items-center gap-3 p-2">
                        <input type="checkbox">
                        <img src="https://via.placeholder.com/60x60?text=Lipstik" class="rounded">
                        <div>
                            <p class="font-semibold">Lipstik Wanita</p>
                            <small class="text-gray-500">SKU Induk: -</small><br>
                            <small class="text-gray-500">ID Produk: 257138</small>
                        </div>
                    </td>
                    <td class="p-2">90</td>
                    <td class="p-2">Rp 55.000 - Rp 70.000</td>
                    <td class="p-2">200</td>
                </tr>
            </tbody>
        </table>
    </main>
</div>
@endsection
