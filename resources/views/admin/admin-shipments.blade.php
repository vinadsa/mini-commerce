@extends('layouts.admin')

@section('page_title', 'Pengiriman Saya')

@section('content')
    <h2 class="text-2xl font-bold mb-4 mt-12">Pengiriman Saya</h2>

    {{-- Filter Batas Pengiriman --}}
    <div class="flex items-center mb-4">
        <span class="mr-4 font-medium">Batas Pengiriman</span>
        <button class="border border-gray-400 bg-white px-3 py-1 rounded-full mr-2 hover:bg-[#ef79fc] hover:text-white text-sm">Terlambat (0)</button>
        <button class="border border-gray-400 bg-white px-3 py-1 rounded-full mr-2 hover:bg-[#ef79fc] hover:text-white text-sm">Kurang dari 24 jam (6)</button>
        <button class="border border-gray-400 bg-white px-3 py-1 rounded-full mr-2 hover:bg-[#ef79fc] hover:text-white text-sm">Lebih dari 24 jam (39)</button>
    </div>

    {{-- Filter Jasa Kirim --}}
    <div class="flex items-center mb-4">
        <span class="mr-4 font-medium">Jasa Kirim</span>
        <button class="border border-gray-400 bg-white px-3 py-1 rounded-full mr-2 hover:bg-[#ef79fc] hover:text-white text-sm">SiCepat REG (7)</button>
        <button class="border border-gray-400 bg-white px-3 py-1 rounded-full mr-2 hover:bg-[#ef79fc] hover:text-white text-sm">JNT REG (29)</button>
        <button class="border border-gray-400 bg-white px-3 py-1 rounded-full mr-2 hover:bg-[#ef79fc] hover:text-white text-sm">Pos Indonesia (5)</button>
    </div>

    <p class="mb-3"><strong>1 Paket</strong></p>

    {{-- Tabel Pengiriman --}}
    <table class="w-full border-collapse bg-white shadow-md">
        <thead>
          <tr>
            <th class="bg-[#d3c7d8] p-3 text-left">Produk</th>
            <th class="bg-[#d3c7d8] p-3 text-left">Diproses</th>
            <th class="bg-[#d3c7d8] p-3 text-left">Dikirim</th>
            <th class="bg-[#d3c7d8] p-3 text-left">Selesai</th>
            <th class="bg-[#d3c7d8] p-3 text-left">Batal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="p-4 border-b border-gray-200">
              <div class="flex items-center">
                <input type="checkbox" class="mr-3">
                <img src="https://via.placeholder.com/80x80?text=Lipstik" alt="Produk" class="rounded-lg shadow-sm w-20 h-20 mr-3">
                <div>
                  <p><strong>Lipstik Wanita</strong></p>
                  <small class="text-gray-600">SKU Induk: -</small><br>
                  <small class="text-gray-600">ID Produk: 257138</small>
                </div>
              </div>
            </td>
            <td class="p-4 border-b border-gray-200">✓</td>
            <td class="p-4 border-b border-gray-200">Dalam Perjalanan</td>
            <td class="p-4 border-b border-gray-200">-</td>
            <td class="p-4 border-b border-gray-200">-</td>
          </tr>
        </tbody>
    </table>
@endsection