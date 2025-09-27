<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Commerce | @yield('title')</title>
    
    {{-- Tailwind CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Feather Icon & Fonts --}}
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,600;1,700&display=swap" rel="stylesheet">
    
    <style>
        body { padding-top: 80px; }
        .header-logo span { color: #b000b5; }
        .search-bar button { background-color: #b168d9; }
    </style>
</head>
<body class="bg-[#f3f3f3] font-[Poppins,sans-serif]">
    
    {{-- Header Start (Kategori&rekomendasi.html) --}}
    <header class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-14 py-4 bg-[#ef79fc] shadow-md">
        <a href="#" class="header-logo text-2xl font-bold italic text-white">Mini<span>Commerce</span></a>
        
        <div class="search-bar flex items-center bg-white rounded-md overflow-hidden flex-1 max-w-xl mx-5">
            <input type="text" placeholder="Daftar & Dapat Voucher Gratis" class="border-none px-3 py-2 outline-none flex-1 text-sm">
            <button class="border-none px-3 py-2 text-white cursor-pointer hover:opacity-80">
                <i data-feather="search" class="w-5 h-5"></i>
            </button>
        </div>

        <div class="auth-links flex items-center gap-4">
            <a href="#Daftar" class="text-white font-bold hover:underline hover:text-white/80">Daftar</a> 
            <span class="text-white">|</span>
            <a href="#Login" class="text-white font-bold hover:underline hover:text-white/80">Log In</a>
        </div>

        <div class="header-extra ml-4">
            <a href="#" id="shopping-cart" class="text-white hover:text-[#b000b5]"><i data-feather="shopping-cart" class="w-6 h-6"></i></a>
        </div>
    </header>
    {{-- Header End --}}

    <main>
        @yield('content')
    </main>

    <script> feather.replace(); </script>
</body>
</html>