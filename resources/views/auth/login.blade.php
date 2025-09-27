{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Pengguna - SAGA</title>

  {{-- Tailwind via CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Google Fonts: Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    html, body { height: 100%; }
    .font-poppins { font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji', sans-serif; }
  </style>
</head>
<body class="font-poppins bg-white text-slate-900 select-none">
  {{-- Header --}}
  <header class="fixed inset-x-0 top-0 z-50 h-20 bg-white/90 backdrop-blur border-b border-slate-100">
    <div class="h-full flex items-center gap-4 pl-4">
      <a href="{{ url('/') }}" class="text-2xl font-extrabold italic tracking-tight text-fuchsia-700">
        SA<span class="text-fuchsia-700">GA</span>
      </a>
      <span class="text-base font-medium text-slate-900">Log in</span>
    </div>
  </header>

  <main class="pt-20 h-[calc(100vh-80px)]">
    <div class="flex h-full flex-col md:flex-row">
      {{-- Panel kiri --}}
      <section class="flex-1 bg-gradient-to-br from-[#C77DFF] to-[#EF79FC] text-white flex items-center justify-center p-10">
        <div class="text-center">
          {{-- Icon keranjang --}}
          <div class="mb-6 inline-flex text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-20 h-20">
              <circle cx="9" cy="21" r="1"></circle>
              <circle cx="20" cy="21" r="1"></circle>
              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
          </div>
          <div class="brand-text">
            <h1 class="mt-2 text-4xl font-extrabold italic select-none">
              <span class="text-white">SA</span><span class="text-[#5a0a78]">GA</span>
            </h1>
            <p class="mt-2 text-lg font-semibold leading-tight">
              <span class="text-[#5a0a78]">Store All</span>
              <span class="text-white">Goods Available</span>
            </p>
          </div>
        </div>
      </section>

      {{-- Panel kanan --}}
      <section class="flex-1 bg-slate-50 flex items-center justify-center p-6 md:p-10">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-[0_20px_60px_-10px_rgba(199,125,255,0.2)] p-8">
          <h2 class="text-center text-2xl font-bold mb-8">Log in</h2>

          {{-- Form login --}}
          <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            {{-- Identity --}}
            <div>
              <label for="identity" class="sr-only">No. Handphone / Username / Email</label>
              <input id="identity" name="identity" type="text" required
                     placeholder="No.Handphone/Username/Email"
                     class="w-full rounded-lg border border-slate-200 px-4 py-3 text-base outline-none focus:ring-4 focus:ring-fuchsia-100 focus:border-fuchsia-200" />
            </div>

            {{-- Password + toggle --}}
            <div class="relative">
              <label for="password" class="sr-only">Password</label>
              <input id="password" name="password" type="password" required placeholder="Password"
                     class="w-full rounded-lg border border-slate-200 px-4 py-3 pr-12 text-base outline-none focus:ring-4 focus:ring-fuchsia-100 focus:border-fuchsia-200" />
              <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 px-3 grid place-items-center opacity-80" aria-label="Tampilkan/sembunyikan kata sandi">
                <img src="{{ asset('assets/eye.svg') }}" alt="toggle" class="w-5 h-5" />
              </button>
            </div>

            {{-- Tombol login --}}
            <button type="submit" class="w-full rounded-lg bg-gradient-to-br from-[#EF79FC] to-[#EF79FC] text-white font-semibold py-3 transition-transform hover:-translate-y-0.5 hover:shadow-[0_10px_30px_-10px_rgba(199,125,255,0.4)] active:translate-y-0">
              LOG IN
            </button>

            {{-- Link lupa password --}}
            <div class="text-left mt-1">
              <a href="{{ route('password.request') }}" class="text-sm text-slate-700 hover:underline">Lupa Password?</a>
            </div>

            {{-- Divider --}}
            <div class="flex items-center gap-3 my-3 text-slate-500 text-sm">
              <span class="flex-1 border-t border-slate-200"></span>
              <span>ATAU</span>
              <span class="flex-1 border-t border-slate-200"></span>
            </div>

            {{-- Login sosial --}}
            <div class="flex gap-3 mb-1">
              <button type="button" class="flex-1 border border-slate-200 rounded-lg px-4 py-3 text-sm inline-flex items-center justify-center gap-2 bg-white">
                <img src="{{ asset('assets/facebook.png') }}" alt="Facebook" class="w-5 h-5"> Facebook
              </button>
              <button type="button" class="flex-1 border border-slate-200 rounded-lg px-4 py-3 text-sm inline-flex items-center justify-center gap-2 bg-white">
                <img src="{{ asset('assets/google.png') }}" alt="Google" class="w-5 h-5"> Google
              </button>
            </div>

            {{-- Link register --}}
            <p class="text-center text-sm text-slate-600 mt-2">
              Baru di SAGA? <a href="{{ route('register') }}" class="text-[#EF79FC] font-semibold hover:underline">Daftar</a>
            </p>
          </form>
        </div>
      </section>
    </div>
  </main>

  {{-- Script toggle password --}}
  <script>
    (function() {
      const passwordField = document.getElementById('password');
      const toggleBtn = document.getElementById('togglePassword');
      let isShown = false;
      if (!passwordField || !toggleBtn) return;
      toggleBtn.addEventListener('click', function () {
        isShown = !isShown;
        passwordField.type = isShown ? 'text' : 'password';
        const img = this.querySelector('img');
        if (img) img.src = isShown ? '{{ asset('assets/eye-off.svg') }}' : '{{ asset('assets/eye.svg') }}';
      });
    })();
  </script>
</body>
</html>
