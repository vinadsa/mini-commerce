<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="font-[Poppins] bg-gray-100 text-black pt-20">
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between bg-pink-400 px-8 py-4 shadow">
        <a href="#" class="text-2xl font-bold italic text-white">Mini<span class="text-purple-900">Commerce</span></a>

        <div class="flex items-center bg-white rounded overflow-hidden max-w-md w-full mx-6">
            <input type="text" placeholder="Daftar & Dapat Voucher Gratis" class="flex-1 px-3 py-2 text-sm outline-none">
            <button class="bg-purple-400 px-3 py-2 text-white"><i data-feather="search"></i></button>
        </div>

        <div class="flex items-center gap-4">
            <a href="#Daftar" class="font-bold text-white hover:text-pink-100">Daftar</a>|
            <a href="#Login" class="font-bold text-white hover:text-pink-100">Log In</a>
            <a href="#" id="shopping-cart" class="ml-4 text-white"><i data-feather="shopping-cart"></i></a>
        </div>
    </header>

    <main class="px-8 py-6">
        @yield('content')
    </main>

    <script>feather.replace()</script>
</body>
</html>
