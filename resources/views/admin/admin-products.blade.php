@extends('layouts.admin')

@section('page_title', 'Produk Saya')

@section('content')
    <h2 class="text-2xl font-bold mb-4 mt-12">Produk Saya</h2>

    {{-- Tombol Aksi --}}
    <div class="flex gap-4 mb-4">
        <button class="px-3 py-1 text-sm rounded-md text-white bg-[#f28b82] hover:opacity-85 transition duration-300">Hapus</button>
        <button class="px-3 py-1 text-sm rounded-md text-white bg-[#a7c7e7] hover:opacity-85 transition duration-300">Edit</button>
        <button class="px-3 py-1 text-sm rounded-md text-white bg-[#cba0e6] hover:opacity-85 transition duration-300">+ Tambah Produk</button>
    </div>

    {{-- Tabs --}}
    <div class="flex gap-5 border-b border-gray-300 mb-4">
        <button class="px-3 py-2 text-sm border-b-2 border-[#8a2be2] font-bold">Semua</button>
        <button class="px-3 py-2 text-sm hover:text-[#ef79fc] hover:border-b-2 hover:border-[#ef79fc] transition duration-300">Tambah Stok</button>
    </div>

    {{-- Info jumlah produk --}}
    <p class="mb-3"><strong>1 Produk</strong></p>

    {{-- Tabel Produk --}}
    <table class="w-full border-collapse bg-white shadow-md">
        <thead>
          <tr>
            <th class="bg-[#d3c7d8] p-3 text-left">Produk</th>
            <th class="bg-[#d3c7d8] p-3 text-left">Penjualan</th>
            <th class="bg-[#d3c7d8] p-3 text-left">Harga</th>
            <th class="bg-[#d3c7d8] p-3 text-left">Stok</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="p-4 border-b border-gray-200">
              <div class="flex items-center gap-3">
                <input type="checkbox">
                <img src="https://via.placeholder.com/60x60?text=Lipstik" alt="Lipstik" class="rounded-lg shadow-sm w-16 h-16">
                <div>
                  <p class="font-bold">Lipstik Wanita</p>
                  <small class="text-gray-600">SKU Induk: -</small><br>
                  <small class="text-gray-600">ID Produk: 257138</small>
                </div>
              </div>
            </td>
            <td class="p-4 border-b border-gray-200">90</td>
            <td class="p-4 border-b border-gray-200">Rp 55.000 - Rp 70.000</td>
            <td class="p-4 border-b border-gray-200">200</td>
          </tr>
        </tbody>
    </table>
@endsection