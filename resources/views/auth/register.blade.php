{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Pengguna - Mini-Commerce</title>

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
          <h2 class="text-center text-2xl font-bold mb-8">Daftar</h2>

          {{-- Form pendaftaran --}}
          <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            {{-- Name --}}
            <div>
              <label for="name" class="sr-only">Name</label>
              <input id="name" name="name" type="text" required autocomplete="name"
                     value="{{ old('name') }}"
                     placeholder="Name"
                     class="w-full rounded-lg border border-slate-200 px-4 py-3 text-base outline-none focus:ring-4 focus:ring-fuchsia-100 focus:border-fuchsia-200" />
              @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            {{-- Email --}}
            <div>
              <label for="email" class="sr-only">Email</label>
              <input id="email" name="email" type="email" required autocomplete="email"
                     value="{{ old('email') }}"
                     placeholder="Email"
                     class="w-full rounded-lg border border-slate-200 px-4 py-3 text-base outline-none focus:ring-4 focus:ring-fuchsia-100 focus:border-fuchsia-200" />
              @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            {{-- No. Handphone --}}
            <div>
              <label for="phone" class="sr-only">No. Handphone</label>
              <input id="phone" name="phone" type="tel" required autocomplete="tel"
                     value="{{ old('phone') }}"
                     placeholder="No. Handphone"
                     class="w-full rounded-lg border border-slate-200 px-4 py-3 text-base outline-none focus:ring-4 focus:ring-fuchsia-100 focus:border-fuchsia-200" />
              @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            {{-- Password + toggle --}}
            <div class="relative">
              <label for="password" class="sr-only">Password</label>
              <input id="password" name="password" type="password" required autocomplete="new-password"
                     placeholder="Password"
                     class="w-full rounded-lg border border-slate-200 px-4 py-3 pr-12 text-base outline-none focus:ring-4 focus:ring-fuchsia-100 focus:border-fuchsia-200" />
              <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 px-3 grid place-items-center opacity-80" aria-label="Tampilkan/sembunyikan password">
                <img src="{{ asset('assets/eye.svg') }}" alt="toggle" class="w-5 h-5" />
              </button>
              @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            {{-- Confirm Password + toggle --}}
            <div class="relative">
              <label for="password_confirmation" class="sr-only">Confirm Password</label>
              <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                     placeholder="Confirm Password"
                     class="w-full rounded-lg border border-slate-200 px-4 py-3 pr-12 text-base outline-none focus:ring-4 focus:ring-fuchsia-100 focus:border-fuchsia-200" />
              <button type="button" id="togglePasswordConfirm" class="absolute inset-y-0 right-0 px-3 grid place-items-center opacity-80" aria-label="Tampilkan/sembunyikan confirm password">
                <img src="{{ asset('assets/eye.svg') }}" alt="toggle" class="w-5 h-5" />
              </button>
            </div>

            {{-- Already Registered? --}}
            <p class="text-center text-sm text-slate-600">
              Already Registered?
              <a href="{{ route('login') }}" class="text-[#EF79FC] font-semibold hover:underline">Login</a>
            </p>

            {{-- Tombol Register --}}
            <button type="submit" class="w-full rounded-lg bg-gradient-to-br from-[#EF79FC] to-[#EF79FC] text-white font-semibold py-3 transition-transform hover:-translate-y-0.5 hover:shadow-[0_10px_30px_-10px_rgba(199,125,255,0.4)] active:translate-y-0">
              Register
            </button>
          </form>
        </div>
      </section>
    </div>
  </main>

  {{-- Script toggle password (password & confirm) --}}
  <script>
    (function() {
      function setupToggle(inputId, btnId) {
        const field = document.getElementById(inputId);
        const btn = document.getElementById(btnId);
        if (!field || !btn) return;
        let isShown = false;
        btn.addEventListener('click', function () {
          isShown = !isShown;
          field.type = isShown ? 'text' : 'password';
          const img = this.querySelector('img');
          if (img) img.src = isShown ? '{{ asset('assets/eye-off.svg') }}' : '{{ asset('assets/eye.svg') }}';
        });
      }
      setupToggle('password', 'togglePassword');
      setupToggle('password_confirmation', 'togglePasswordConfirm');
    })();
  </script>
</body>
</html>
