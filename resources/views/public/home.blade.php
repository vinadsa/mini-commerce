@extends('layouts.app')

@section('content')
<section class="text-center mt-20">
    <h2 class="text-lg font-bold text-gray-600 mb-6">KATEGORI</h2>
    <div class="grid grid-cols-2 md:grid-cols-6 gap-6">
        <div class="bg-purple-100 rounded-xl p-4 flex flex-col items-center hover:scale-105 transition">
            <img src="img/pakaian-pria.jpeg" alt="Pakaian Pria" class="w-20 h-20 object-contain mb-2">
            <p class="text-sm font-medium text-gray-700">Pakaian Pria</p>
        </div>
        <!-- Tambahkan kategori lain -->
    </div>
</section>

<section class="mt-16">
    <h3 class="text-center text-pink-500 text-lg font-semibold mb-8">REKOMENDASI</h3>
    <div class="grid grid-cols-2 md:grid-cols-6 gap-6">
        <div class="bg-purple-50 rounded-xl p-4 shadow text-left">
            <img src="img/dress_pantai.jpg" alt="Dress Pantai Wanita" class="rounded-lg mb-2">
            <h4 class="text-sm font-semibold">Noni Dress Korean Style</h4>
            <p class="text-orange-500 font-bold">Rp. 99.000</p>
            <p class="text-xs text-gray-600">⭐ 4.9 | 420 terjual</p>
        </div>
    </div>

    <ul class="flex justify-center gap-3 mt-6">
        <li class="px-3 py-1 border rounded text-pink-500 cursor-pointer">&laquo;</li>
        <li class="px-3 py-1 border rounded bg-pink-500 text-white">1</li>
        <li class="px-3 py-1 border rounded text-pink-500">2</li>
        <li class="px-3 py-1 border rounded text-pink-500">3</li>
        <li class="px-3 py-1 border rounded text-pink-500">&raquo;</li>
    </ul>
</section>
@endsection
