<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Commerce | @yield('page_title')</title>

    {{-- Tailwind CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Feather Icon & Fonts --}}
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,600;1,700&display=swap" rel="stylesheet">
    
    <style>
        /* Menggunakan style dari style.css Anda yang sulit dikonversi Tailwind */
        body { padding-top: 64px; }
        .header-logo span { color: #b000b5; }
        .header-logo .page { color: #333; font-style: normal; margin-left: 10px; font-weight: 300; font-size: 1.2rem; }
        .sidebar { min-height: calc(100vh - 64px); } 
    </style>
</head>
<body class="bg-[#f3f3f3] font-[Poppins,sans-serif]">
    
    {{-- Header Start --}}
    <header class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-6 py-3 bg-[#ef79fc] text-white shadow-md">
        <a href="#" class="header-logo text-2xl font-bold italic flex items-baseline">
            Mini<span>Commerce</span> <span class="page">@yield('page_title')</span>
        </a>
    </header>
    {{-- Header End --}}

    <div class="flex">
        {{-- Sidebar --}}
        <aside class="sidebar w-52 bg-[#f2e6f5] p-5 shadow-lg">
            <nav>
                <ul class="list-none p-0">
                    <li class="mb-5"><a href="{{ route('orders.index') }}" class="text-[#979696] hover:text-[#29002a] text-lg font-medium @if(Request::routeIs('orders.index')) font-semibold border-b-2 border-[#29002a] text-[#29002a] @endif">Pesanan</a></li>
                    <li class="mb-5"><a href="{{ route('shipments.index') }}" class="text-[#979696] hover:text-[#29002a] text-lg font-medium @if(Request::routeIs('shipments.index')) font-semibold border-b-2 border-[#29002a] text-[#29002a] @endif">Pengiriman</a></li>
                    <li class="mb-5"><a href="{{ route('products.admin_index') }}" class="text-[#979696] hover:text-[#29002a] text-lg font-medium @if(Request::routeIs('products.admin_index')) font-semibold border-b-2 border-[#29002a] text-[#29002a] @endif">Produk</a></li>
                </ul>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-8 bg-[#fdf9ff]">
            @yield('content')
        </main>
    </div>

    <script> feather.replace(); </script>
</body>
</html>