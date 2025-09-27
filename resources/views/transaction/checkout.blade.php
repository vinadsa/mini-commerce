{{-- resources/views/checkout.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Checkout - SAGA</title>

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
  <header class="flex justify-between items-center px-6 py-4 bg-fuchsia-400 text-white border-b border-gray-200">
    <div class="flex items-center gap-2">
      <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-10 h-10"/>
      <h1 class="text-xl font-bold italic">
        <span class="text-white">SA</span><span class="text-fuchsia-900">GA</span>
      </h1>
    </div>
    <span class="text-lg font-semibold">Checkout</span>
  </header>

  {{-- Container --}}
  <main class="max-w-5xl mx-auto mt-8 bg-white rounded-xl shadow p-6">
    <h2 class="text-2xl font-bold mb-6">Checkout</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      
      {{-- Form Alamat --}}
      <section class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Alamat Pengiriman</h3>
        <form action="#" method="POST" class="space-y-4">
          <div>
            <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
            <input type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-fuchsia-200 focus:border-fuchsia-400"/>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">No. Telepon</label>
            <input type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-fuchsia-200 focus:border-fuchsia-400"/>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
            <input type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-fuchsia-200 focus:border-fuchsia-400"/>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Kode Pos</label>
            <input type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-fuchsia-200 focus:border-fuchsia-400"/>
          </div>
        </form>
      </section>

      {{-- Ringkasan Pesanan --}}
      <section class="bg-gray-50 p-6 rounded-lg border border-gray-200">
        <h3 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h3>
        
        {{-- Produk --}}
        <div class="space-y-4">
          @php
            $subtotal = 0;
          @endphp

          @foreach($cartItems as $item)
            @php
              $lineTotal = $item['price'] * $item['quantity'];
              $subtotal += $lineTotal;
            @endphp
            <div class="flex items-center border-b border-gray-200 pb-3">
              <img src="{{ asset('assets/sample-product.jpg') }}" alt="Produk" class="w-16 h-16 rounded-md object-cover mr-4"/>
              <div class="flex-1">
                <h4 class="text-base font-medium">{{ $item['name'] }}</h4>
                <p class="text-sm text-gray-500">x{{ $item['quantity'] }}</p>
              </div>
              <span class="font-semibold text-gray-700">Rp {{ number_format($lineTotal, 0, ',', '.') }}</span>
            </div>
          @endforeach
        </div>

        {{-- Total --}}
        @php
          $ongkir = 20000; // contoh ongkir flat
          $total = $subtotal + $ongkir;
        @endphp

        <div class="mt-6 space-y-2 text-sm">
          <div class="flex justify-between">
            <span>Subtotal</span>
            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
          </div>
          <div class="flex justify-between">
            <span>Ongkir</span>
            <span>Rp {{ number_format($ongkir, 0, ',', '.') }}</span>
          </div>
          <div class="flex justify-between font-bold text-base border-t pt-2">
            <span>Total</span>
            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
          </div>
        </div>

        {{-- Metode Pembayaran --}}
        <div class="mt-6">
          <h4 class="text-sm font-semibold mb-2">Metode Pembayaran</h4>
          <div class="space-y-2">
            <label class="flex items-center gap-2">
              <input type="radio" name="metode_pembayaran" value="COD" class="text-fuchsia-500 focus:ring-fuchsia-400">
              <span>COD (Bayar di Tempat)</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="radio" name="metode_pembayaran" value="E-Wallet" class="text-fuchsia-500 focus:ring-fuchsia-400">
              <span>E-Wallet</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="radio" name="metode_pembayaran" value="Transfer Bank" class="text-fuchsia-500 focus:ring-fuchsia-400">
              <span>Transfer Bank</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="radio" name="metode_pembayaran" value="Kartu Debit" class="text-fuchsia-500 focus:ring-fuchsia-400">
              <span>Kartu Debit</span>
            </label>
          </div>
        </div>

        {{-- Tombol Checkout --}}
        <button class="w-full mt-6 rounded-lg bg-fuchsia-500 text-white font-semibold py-3 hover:bg-fuchsia-600 transition">
          Bayar Sekarang
        </button>
      </section>
    </div>
  </main>

</body>
</html>
