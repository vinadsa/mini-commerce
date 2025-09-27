{{-- resources/views/auth/register-success.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Berhasil - SAGA</title>

  {{-- Tailwind via CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Google Fonts: Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>

  <style>
    html, body { height: 100%; }
    .font-poppins { font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, sans-serif; }
  </style>
</head>
<body class="font-poppins bg-white text-slate-900">
  {{-- Header --}}
  <header class="fixed inset-x-0 top-0 z-50 h-20 bg-white/90 backdrop-blur border-b border-slate-100">
    <div class="h-full flex items-center gap-4 pl-4">
      <a href="{{ url('/') }}" class="text-2xl font-extrabold italic tracking-tight text-fuchsia-700">
        SA<span class="text-fuchsia-700">GA</span>
      </a>
      <span class="text-base font-medium text-slate-900">Register</span>
    </div>
  </header>

  <main class="pt-20 h-[calc(100vh-80px)]">
    <div class="flex h-full flex-col md:flex-row">
      {{-- Panel kiri (branding) --}}
      <section class="flex-1 bg-gradient-to-br from-[#C77DFF] to-[#EF79FC] text-white flex items-center justify-center p-10">
        <div class="text-center">
          <div class="mb-6 inline-flex text-white">
            {{-- Ikon keranjang --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" 
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                 stroke-linejoin="round" class="w-20 h-20">
              <circle cx="9" cy="21" r="1"></circle>
              <circle cx="20" cy="21" r="1"></circle>
              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
          </div>
          <h1 class="mt-2 text-4xl font-extrabold italic select-none">
            <span class="text-white">SA</span><span class="text-[#5a0a78]">GA</span>
          </h1>
          <p class="mt-2 text-lg font-semibold leading-tight">
            <span class="text-[#5a0a78]">Store All</span>
            <span class="text-white">Goods Available</span>
          </p>
        </div>
      </section>

      {{-- Panel kanan (notifikasi sukses) --}}
      <section class="flex-1 bg-slate-50 flex items-center justify-center p-6 md:p-10">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-[0_20px_60px_-10px_rgba(199,125,255,0.2)] p-8 text-center">
          <h2 class="text-2xl font-bold mb-6">Daftar Berhasil</h2>

          {{-- Icon check --}}
          <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/check-mark-icon-vector.jpg') }}" 
                 alt="Success" class="w-20 h-20 object-contain">
          </div>

          <p class="text-sm text-slate-600 leading-relaxed mb-6">
            Selamat! Akun SAGA Anda telah berhasil dibuat.<br/>
            Silakan login untuk mulai berbelanja.
          </p>

          {{-- Tombol login --}}
          <a href="{{ route('login') }}"
             class="w-full inline-block rounded-lg bg-gradient-to-br from-[#EF79FC] to-[#EF79FC] text-white 
                    font-semibold py-3 px-4 transition-transform hover:-translate-y-0.5 
                    hover:shadow-[0_10px_30px_-10px_rgba(199,125,255,0.4)] active:translate-y-0">
            LOGIN
          </a>

          {{-- Link ke beranda --}}
          <div class="mt-4">
            <a href="{{ url('/') }}" class="text-sm text-fuchsia-600 hover:underline">Kembali ke Beranda</a>
          </div>
        </div>
      </section>
    </div>
  </main>
</body>
</html>
