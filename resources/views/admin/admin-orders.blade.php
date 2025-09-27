@extends('layouts.admin')

@section('page_title', 'Pesanan Saya')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Pesanan Saya</h2>

    {{-- Tabs --}}
    <div class="flex border-b border-gray-300 mb-5">
        <button class="px-3 py-2 text-sm hover:text-[#ef79fc] transition duration-150">Semua</button>
        <button class="px-3 py-2 text-sm hover:text-[#ef79fc] transition duration-150">Belum Bayar</button>
        <button class="px-3 py-2 text-sm hover:text-[#ef79fc] transition duration-150">Perlu Dikirim</button>
        <button class="px-3 py-2 text-sm hover:text-[#ef79fc] transition duration-150">Dikirim</button>
        <button class="px-3 py-2 text-sm hover:text-[#ef79fc] transition duration-150">Selesai</button>
        <button class="px-3 py-2 text-sm hover:text-[#ef79fc] transition duration-150">Pengembalian/Pembatalan</button>
    </div>

    {{-- Filter Status Pesanan --}}
    <div class="flex items-center mb-4">
        <span class="mr-4 font-medium">Status Pesanan</span>
        <button class="border border-gray-500 bg-white px-3 py-1 rounded-full mr-2 hover:bg-[#ef79fc] hover:text-white text-sm">Semua</button>
        <button class="border border-gray-500 bg-white px-3 py-1 rounded-full mr-2 hover:bg-[#ef79fc] hover:text-white text-sm">Perlu diproses</button>
        <button class="border border-gray-500 bg-white px-3 py-1 rounded-full mr-2 hover:bg-[#ef79fc] hover:text-white text-sm">Telah diproses</button>
    </div>

    {{-- Filter Inputs --}}
    <div class="flex items-center mb-5">
        <input type="text" placeholder="No. Pesanan" class="p-2 mr-2 border border-gray-300 rounded-md">
        <select class="p-2 mr-2 border border-gray-300 rounded-md">
            <option>Jasa Kirim</option>
            <option>SiCepat Reg</option>
            <option>JNE</option>
            <option>Pos Indonesia</option>
        </select>
    </div>

    <p class="mb-3"><strong>1 Paket</strong></p>

    {{-- Tabel Pesanan --}}
    <table class="w-full border-collapse bg-white shadow-md">
        <thead>
            <tr>
                <th class="bg-[#d3c7d8] p-3 text-left">Produk</th>
                <th class="bg-[#d3c7d8] p-3 text-left">Status</th>
                <th class="bg-[#d3c7d8] p-3 text-left">Jasa Kirim</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <input type="checkbox" class="mr-3">
                        <img src="https://via.placeholder.com/80x80?text=Tshirt" alt="Produk" class="rounded-lg shadow-sm w-20 h-20 mr-3">
                    </div>
                </td>
                <td class="p-4 border-b border-gray-200">Telah diproses</td>
                <td class="p-4 border-b border-gray-200">SiCepat Reg</td>
            </tr>
        </tbody>
    </table>
@endsection