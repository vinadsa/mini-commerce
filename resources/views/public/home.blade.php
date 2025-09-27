@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    
    {{-- Kategori Start --}}
    <section class="px-14 py-16 text-center">
        <h2 class="text-xl mb-5 relative top-[-30px] text-gray-600 font-bold">KATEGORI</h2>
        <div class="grid grid-cols-6 gap-5 justify-items-center">
            
            {{-- Data Kategori (Anda bisa mengganti ini dengan loop @foreach dari database) --}}
            @php
                $categories = [
                    ['pakaian-pria.jpeg', 'Pakaian Pria'], ['sepatu-pria.jpeg', 'Sepatu Pria'],
                    ['tas-pria.jpeg', 'Tas Pria'], ['aksesoris.jpeg', 'Aksesoris Fashion'],
                    ['makanan.jpeg', 'Makanan & Minuman'], ['kecantikan.jpeg', 'Perawatan & Kecantikan'],
                    ['rumah.jpeg', 'Perlengkapan Rumah'], ['pakaian-wanita.jpeg', 'Pakaian Wanita'],
                    ['fashion-wanita.jpeg', 'Fashion Wanita'], ['sepatu-wanita.jpeg', 'Sepatu Wanita'],
                    ['tas-wanita.jpeg', 'Tas Wanita'], ['hobi.jpeg', 'Hobi & Koleksi'],
                ];
            @endphp

            @foreach($categories as $cat)
                <div class="bg-[#faf0ff] rounded-2xl p-5 w-[150px] h-[160px] flex flex-col items-center justify-center transition duration-300 hover:scale-[1.05] cursor-pointer shadow-sm">
                    <img src="{{ asset('img/' . $cat[0]) }}" alt="{{ $cat[1] }}" class="w-[90px] h-[90px] object-contain mb-3">
                    <p class="text-sm font-medium text-gray-700">{{ $cat[1] }}</p>
                </div>
            @endforeach
        </div>
    </section>
    {{-- Kategori End --}}
    
    {{-- Rekomendasi Start --}}
    <section class="px-14 py-6">
        <h3 class="text-center text-xl mb-8 text-[#ef79fc] font-semibold">REKOMENDASI</h3>
        <div class="grid grid-cols-6 gap-5 justify-items-center">
            {{-- Kartu Produk Contoh --}}
            <div class="bg-[#f9f0ff] rounded-xl p-3 w-[180px] text-left shadow-md transition duration-300 hover:shadow-lg">
                <img src="{{ asset('img/dress_pantai.jpg') }}" alt="Dress Pantai Wanita" class="w-full rounded-lg mb-3">
                <h4 class="text-sm font-semibold mt-1 mb-1">Noni Dress Korean Style</h4>
                <p class="text-orange-600 font-bold cursor-default">Rp. 99.000</p>
                <p class="text-xs text-gray-600">⭐ 4.9 | 420 terjual</p>
            </div>
            {{-- Tambahkan loop @foreach produk dari database di sini --}}
        </div>

        {{-- Pagination --}}
        <ul class="flex justify-center list-none gap-3 mt-5">
            <li class="cursor-pointer px-3 py-1 border border-[#ef79fc] rounded-md text-[#ef79fc] hover:bg-[#ef79fc] hover:text-white">&laquo;</li>
            <li class="cursor-pointer px-3 py-1 border border-[#ef79fc] rounded-md text-white bg-[#ef79fc] font-bold">1</li>
            <li class="cursor-pointer px-3 py-1 border border-[#ef79fc] rounded-md text-[#ef79fc] hover:bg-[#ef79fc] hover:text-white">2</li>
            <li class="cursor-pointer px-3 py-1 border border-[#ef79fc] rounded-md text-[#ef79fc] hover:bg-[#ef79fc] hover:text-white">3</li>
            <li class="cursor-pointer px-3 py-1 border border-[#ef79fc] rounded-md text-[#ef79fc] hover:bg-[#ef79fc] hover:text-white">&raquo;</li>
        </ul>
    </section>
    {{-- Rekomendasi End --}}
@endsection