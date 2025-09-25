{{-- resources/views/auth/register-success.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Berhasil - Mini-Commerce</title>

  {{-- Tailwind via CDN (untuk cepat pakai).
       Jika project kamu sudah pakai Vite+Tailwind, ganti dengan: @vite('resources/css/app.css') --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Favicon & fonts --}}
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>

  <style>
    html, body {
      font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    }
  </style>
</head>

<body class="min-h-screen bg-white overflow-hidden">
  <!-- Header -->
  <header class="fixed inset-x-0 top-0 z-50 h-20 bg-white/90 backdrop-blur">
    <div class="h-full flex items-center px-6 sm:px-10">
      <a href="{{ url('/') }}" class="text-[1.8rem] font-bold italic text-fuchsia-700 no-underline">
        Mini<span class="text-fuchsia-700">Commerce</span>
      </a>
    </div>
  </header>

  <!-- Body -->
  <div class="flex h-[calc(100vh-80px)] mt-20">
    <!-- Kiri -->
    <div class="hidden md:flex md:flex-1 bg-gradient-to-br from-fuchsia-500 to-fuchsia-300 items-center justify-center text-white">
      <div class="text-center">
        <div class="mb-6">
          <!-- Ikon keranjang -->
          <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="88" height="88" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
          </svg>
        </div>
        <h1 class="text-5xl font-extrabold tracking-tight">
          <span class="italic">SA</span><span class="text-purple-900 italic">GA</span>
        </h1>
        <p class="mt-2 text-white/90">Belanja mudah, aman, dan menyenangkan</p>
      </div>
    </div>

    <!-- Kanan -->
    <div class="flex-1 bg-neutral-100 flex items-center justify-center px-4">
      <div class="bg-white w-full max-w-md rounded-3xl shadow-[0_20px_60px_-10px_rgba(199,125,255,0.25)] p-8 sm:p-12">
        <h2 class="text-center text-2xl font-bold text-neutral-900">Daftar Berhasil</h2>

        <div class="flex justify-center my-6">
          <img
            src="{{ asset('assets/check-mark-icon-vector.jpg') }}"
            alt="Check Success"
            class="w-20 h-20 object-contain"
          />
        </div>

        <p class="text-center text-sm text-neutral-600 leading-relaxed">
          Selamat! Akun Mini-Commerce Anda telah berhasil dibuat.
          Silakan lanjutkan masuk untuk mulai berbelanja.
        </p>

        <a
          href="{{ url('/login') }}"
          class="mt-7 inline-flex justify-center items-center w-full px-4 py-4 rounded-xl font-semibold text-white
                 bg-gradient-to-br from-fuchsia-500 to-fuchsia-400
                 shadow transition-transform duration-200 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-fuchsia-300"
        >
          LOGIN
        </a>

        <div class="mt-4 text-center">
          <a href="{{ url('/') }}" class="text-sm text-fuchsia-600 hover:underline">Kembali ke beranda</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
