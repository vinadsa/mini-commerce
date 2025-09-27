@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    <aside class="w-48 bg-purple-100 min-h-screen p-4">
        <nav>
            <ul class="space-y-4">
                <li><a href="#">Pesanan</a></li>
                <li><a href="#" class="font-semibold text-purple-800 border-b-2 border-purple-800">Pengiriman</a></li>
                <li><a href="#">Produk</a></li>
            </ul>
        </nav>
    </aside>

    <main class="flex-1 p-6 bg-white rounded-lg shadow ml-4">
        <h2 class="text-xl font-semibold mb-4">Pengiriman Saya</h2>

        <div class="flex items-center gap-3 mb-4">
            <span class="font-medium">Batas Pengiriman:</span>
            <button class="border px-3 py-1 rounded-full">Terlambat (0)</button>
            <button class="border px-3 py-1 rounded-full">Kurang dari 24 jam (6)</button>
            <button class="border px-3 py-1 rounded-full">Lebih dari 24 jam (39)</button>
        </div>

        <div class="flex items-center gap-3 mb-4">
            <span class="font-medium">Jasa Kirim:</span>
            <button class="border px-3 py-1 rounded-full">SiCepat REG (7)</button>
            <button class="border px-3 py-1 rounded-full">JNT REG (29)</button>
            <button class="border px-3 py-1 rounded-full">Pos Indonesia (5)</button>
        </div>

        <p class="font-bold mb-2">1 Paket</p>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-purple-200 text-left">
                    <th class="p-2">Produk</th>
                    <th class="p-2">Diproses</th>
                    <th class="p-2">Dikirim</th>
                    <th class="p-2">Selesai</th>
                    <th class="p-2">Batal</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="flex items-center gap-2 p-2">
                        <input type="checkbox">
                        <img src="https://via.placeholder.com/80x80?text=Lipstik" class="rounded">
                        <div>
                            <p class="font-semibold">Lipstik Wanita</p>
                            <small class="text-gray-500">SKU Induk: -</small><br>
                            <small class="text-gray-500">ID Produk: 257138</small>
                        </div>
                    </td>
                    <td class="p-2">✓</td>
                    <td class="p-2">Dalam Perjalanan</td>
                    <td class="p-2">-</td>
                    <td class="p-2">-</td>
                </tr>
            </tbody>
        </table>
    </main>
</div>
@endsection
