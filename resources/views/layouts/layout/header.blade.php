<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexora</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-white">

<!-- TOP BAR -->
<div class="bg-gray-100 text-sm py-2">
    <div class="max-w-7xl mx-auto flex justify-between px-4">
        
        <!-- Social -->
        <div class="flex gap-3 text-gray-600">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-tiktok"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>

        <!-- Contact -->
        <div class="flex gap-4 text-gray-600">
            <span><i class="fa fa-phone"></i> +977-9761201177</span>
            <span><i class="fa fa-envelope"></i> nexora@gmail.com</span>
        </div>

    </div>
</div>

<!-- MAIN NAVBAR -->
<nav class="bg-white shadow  py-10 sticky top-0 z-50">
    <div class="max-w-7xl py-5 mx-auto flex items-center justify-between px-4 py-4">

        <!-- LOGO -->
        <a href="/" class="flex items-center">
            <img src="" class="w-12 h-12 rounded-full" alt="logo">logo
        </a>

        <!-- SEARCH -->
        <form action="" class="hidden md:flex w-1/2">
            <input 
                type="search"
                name="search"
                value=""
                placeholder="Search products..."
                class="w-full border rounded-l-lg px-4 py-2 focus:outline-none"
            >
            <button class="bg-blue-600 text-white px-4 rounded-r-lg">
                <i class="fa fa-search"></i>
            </button>
        </form>

        <!-- RIGHT ICONS -->
        <div class="flex items-center gap-5 text-gray-700">

            <a href="#"><i class="fa fa-bell text-xl"></i></a>
            <a href="#"><i class="fa fa-shopping-cart text-xl"></i></a>

            <!-- AUTH -->
           @auth
<div class="relative" x-data="{ open: false }">

    <!-- Avatar -->
    <div 
        @click="open = !open"
        class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold cursor-pointer"
    >
        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
    </div>

    <!-- Dropdown -->
    <div 
        x-show="open"
        @click.outside="open = false"
        x-transition
        class="absolute right-0 mt-3 w-40 bg-white shadow-lg rounded-lg overflow-hidden"
    >
        <a href="/profile" class="block px-4 py-2 hover:bg-gray-100">
            Settings
        </a>
  <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="w-full text-left px-4 py-2 text-sm text-red-400 hover:text-white hover:bg-red-600 rounded-lg transition">
                🚪 Log Out
            </button>

        </form>
    </div>

</div>
@else
<a href="/login" class="text-blue-600 text-xl">
    <i class="fa fa-user-plus"></i>
</a>
@endauth

        </div>

    </div>
    <!-- MENU -->
    <div class="bg-blue-700 py-7 text-white">
        <div class="max-w-7xl mx-auto  px-4">

            <ul class="flex flex-wrap gap-6 py-3 text-lg">

                <li><a href="/" class="hover:text-yellow-300">Home</a></li>

                <!-- CATEGORY -->
                <li class="relative group">
                    <a class="cursor-pointer hover:text-yellow-300">Categories</a>

                </li>

                <!-- BRANDS -->
                <li class="relative group">
                    <a class="cursor-pointer hover:text-yellow-300">Brands</a>

                   
                </li>

                <li><a href="/about" class="hover:text-yellow-300">About</a></li>
                <li><a href="{{route('pages.contact')}}" class="hover:text-yellow-300">Contact</a></li>
                <li><a href="/emi" class="hover:text-yellow-300">EMI</a></li>
                <li><a href="/blogs" class="hover:text-yellow-300">Blogs</a></li>
                <li><a href="/repair" class="hover:text-yellow-300">Book Repair</a></li>

            </ul>

        </div>
    </div>

</nav>
