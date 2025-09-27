{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome - SAGA</title>

  {{-- Tailwind via CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Google Fonts: Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    .font-poppins { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="font-poppins bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-md text-center">
    {{-- Icon Keranjang --}}
    <div class="flex justify-center mb-6 text-fuchsia-500">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="w-20 h-20"
        aria-hidden="true"
      >
        <circle cx="9" cy="21" r="1"></circle>
        <circle cx="20" cy="21" r="1"></circle>
        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
      </svg>
    </div>

    {{-- Teks Welcome --}}
    <h1 class="text-2xl font-bold text-fuchsia-600 mb-4">
      Selamat Datang di <span class="text-fuchsia-800">SAGA</span>
    </h1>
    <p class="text-gray-600 mb-8">
      Platform belanja sederhana dengan pengalaman modern.
    </p>

    {{-- Tombol Aksi --}}
    <div class="flex flex-col gap-3">
      <a
        href="{{ route('login') }}"
        class="w-full px-5 py-3 bg-fuchsia-500 text-white font-semibold rounded-lg hover:bg-fuchsia-600 transition"
      >
        Masuk
      </a>
      <a
        href="{{ route('register') }}"
        class="w-full px-5 py-3 bg-white text-fuchsia-600 border border-fuchsia-500 font-semibold rounded-lg hover:bg-fuchsia-50 transition"
      >
        Daftar
      </a>
    </div>
  </div>
</body>
</html>
