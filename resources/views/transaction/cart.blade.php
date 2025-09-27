{{-- resources/views/transaction/cart.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Keranjang Belanja - SAGA</title>

  {{-- Tailwind via CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Google Fonts: Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    .font-poppins { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="font-poppins bg-gray-100 text-gray-800">

  {{-- Header --}}
  <header class="bg-fuchsia-400 text-white px-6 py-4 flex justify-between items-center">
    <div class="flex items-center gap-2">
      <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain"/>
      <h1 class="text-xl font-bold italic">
        <span class="text-white">SA</span><span class="text-fuchsia-900">GA</span>
      </h1>
    </div>
    <div class="flex gap-2">
      <input type="text" placeholder="Cari produk..." 
             class="px-3 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-fuchsia-200 focus:border-fuchsia-400"/>
      <button class="px-4 py-2 bg-white text-fuchsia-600 rounded-md font-semibold hover:bg-gray-100">
        Cari
      </button>
    </div>
  </header>

  {{-- Konten --}}
  <main class="max-w-5xl mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>

    {{-- Pesan error/sukses --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif
    @if(session('error'))
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{ session('error') }}
      </div>
    @endif

    {{-- Daftar Produk --}}
    <div class="space-y-4">
      @forelse($cartItems as $item)
        <div class="flex items-center justify-between gap-4 bg-white p-4 rounded-lg shadow">
          <div class="flex items-center gap-4">
            <input type="checkbox" class="w-4 h-4 text-fuchsia-500 rounded border-gray-300 focus:ring-fuchsia-400">
            <img src="{{ asset($item['image'] ?? 'assets/sample-product.jpg') }}" 
                 alt="{{ $item['name'] }}" 
                 class="w-16 h-16 object-cover rounded-md border">
            <div>
              <h3 class="font-medium text-gray-800">{{ $item['name'] }}</h3>
              <p class="text-sm text-gray-500">
                Rp {{ number_format($item['price'], 0, ',', '.') }}
              </p>
            </div>
          </div>
          {{-- Tombol hapus --}}
          <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white text-sm px-3 py-1 rounded-md hover:bg-red-700">
              Hapus
            </button>
          </form>
        </div>
      @empty
        <p class="text-gray-600">Keranjang masih kosong.</p>
      @endforelse
    </div>

    {{-- Checkout --}}
    @if(count($cartItems) > 0)
      <div class="mt-6 bg-fuchsia-400 text-white p-5 rounded-lg flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
          <h3 class="font-semibold text-lg">
            Total: Rp {{ number_format(collect($cartItems)->sum('price'), 0, ',', '.') }}
          </h3>
          <p class="text-sm text-white/90">Termasuk pajak & ongkir</p>
        </div>
        <div class="flex gap-3">
          {{-- Checkout semua --}}
          <form action="{{ route('checkout') }}">
            <button type="submit" class="bg-purple-700 hover:bg-purple-800 px-5 py-2 rounded-md font-bold text-white">
              Checkout
            </button>
          </form>
          {{-- Hapus semua --}}
          <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 px-5 py-2 rounded-md font-bold text-white">
              Hapus Semua
            </button>
          </form>
        </div>
      </div>
    @endif
  </main>

</body>
</html>
