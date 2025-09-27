{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - SAGA</title>

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

  {{-- Main --}}
  <main class="pt-20 h-[calc(100vh-80px)]">
    <div class="flex h-full flex-col md:flex-row">

      {{-- Panel kiri + kanan full ungu --}}
      <section class="flex-1 bg-gradient-to-br from-[#C77DFF] to-[#EF79FC] flex items-center justify-center p-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center w-full max-w-6xl">
          
          {{-- Branding kiri --}}
          <div class="text-center text-white">
            <div class="mb-6 inline-flex">
              {{-- Icon keranjang --}}
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                   stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-20 h-20">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
              </svg>
            </div>
            <h1 class="mt-2 text-4xl font-extrabold italic select-none">SA<span class="text-purple-900">GA</span></h1>
            <p class="mt-2 text-lg font-semibold leading-tight">Store All Goods Available</p>
          </div>

          {{-- Form register --}}
          <div class="bg-white rounded-3xl shadow-lg p-8 w-full max-w-md mx-auto">
            <h2 class="text-center text-2xl font-bold mb-6">Register</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
              @csrf

              <input type="text" name="name" placeholder="Nama Lengkap"
                     class="w-full rounded-lg border border-slate-200 px-4 py-3 text-base focus:ring-4 focus:ring-fuchsia-100 focus:border-fuchsia-300"/>

              <input type="email" name="email" placeholder="Email"
                     class="w-full rounded-lg border border-slate-200 px-4 py-3 text-base focus:ring-4 focus:ring-fuchsia-100 focus:border-fuchsia-300"/>

              {{-- Password dengan toggle --}}
              <div class="relative">
                <input id="password" type="password" name="password" placeholder="Password"
                       class="w-full rounded-lg border border-slate-200 px-4 py-3 text-base focus:ring-4 
                              focus:ring-fuchsia-100 focus:border-fuchsia-300 pr-10"/>
                <button type="button" onclick="togglePassword('password')" 
                        class="absolute inset-y-0 right-3 flex items-center">
                  <img id="password-eye-off" src="{{ asset('assets/eye-off.svg') }}" alt="Sembunyikan" class="w-5 h-5">
                  <img id="password-eye-on" src="{{ asset('assets/eye.svg') }}" alt="Tampilkan" class="w-5 h-5 hidden">
                </button>
              </div>

              {{-- Konfirmasi Password dengan toggle --}}
              <div class="relative">
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                       class="w-full rounded-lg border border-slate-200 px-4 py-3 text-base focus:ring-4 
                              focus:ring-fuchsia-100 focus:border-fuchsia-300 pr-10"/>
                <button type="button" onclick="togglePassword('password_confirmation')" 
                        class="absolute inset-y-0 right-3 flex items-center">
                  <img id="password_confirmation-eye-off" src="{{ asset('assets/eye-off.svg') }}" alt="Sembunyikan" class="w-5 h-5">
                  <img id="password_confirmation-eye-on" src="{{ asset('assets/eye.svg') }}" alt="Tampilkan" class="w-5 h-5 hidden">
                </button>
              </div>

              {{-- Tombol register --}}
              <button type="submit"
                      class="w-full rounded-lg bg-gradient-to-r from-[#EF79FC] to-[#EF79FC] text-white font-semibold py-3">
                REGISTER
              </button>
            </form>

            <p class="mt-6 text-sm text-center">
              Sudah punya akun? <a href="{{ route('login') }}" class="text-fuchsia-600 hover:underline">Log in</a>
            </p>
          </div>
        </div>
      </section>

    </div>
  </main>

  {{-- Script toggle password --}}
  <script>
    function togglePassword(fieldId) {
      const input = document.getElementById(fieldId);
      const eyeOff = document.getElementById(fieldId + '-eye-off');
      const eyeOn = document.getElementById(fieldId + '-eye-on');

      if (input.type === 'password') {
        input.type = 'text';
        eyeOff.classList.add('hidden');
        eyeOn.classList.remove('hidden');
      } else {
        input.type = 'password';
        eyeOn.classList.add('hidden');
        eyeOff.classList.remove('hidden');
      }
    }
  </script>
</body>
</html>
