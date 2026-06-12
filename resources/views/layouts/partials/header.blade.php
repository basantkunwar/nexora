<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexora</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<!-- HEAD -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
 <style>
.category-prev,
.category-next{
    width:48px !important;
    height:48px !important;
    background:#fff;
    border-radius:9999px;
    box-shadow:0 4px 12px rgba(0,0,0,.12);
}

.category-prev::after,
.category-next::after{
    font-size:18px !important;
    color:#374151;
}

.categorySwiper {
    width: 100%;
    padding: 10px 0;
}

.categorySwiper .swiper-slide {
    height: auto;
    display: flex;
}
</style>

</head>

<body class="font-sans bg-white">
<!-- TOP BAR -->
<div class="bg-gray-100 border-b top-0 border-gray-200 text-sm py-1">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4">

        <!-- Social -->
        <div class="flex gap-5 text-blue-600 text-lg">
            <a href="#" class="hover:text-blue-700 transition">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="hover:text-blue-700 transition">
                <i class="fab fa-tiktok"></i>
            </a>
            <a href="#" class="hover:text-blue-700 transition">
                <i class="fab fa-instagram"></i>
            </a>
        </div>

        <!-- Contact -->
        <div class="flex gap-6 text-gray-800 font-medium">
            <span><i class="fa fa-phone"></i> +977-{{settings('phone')}}</span>
            <span><i class="fa fa-envelope"></i>{{settings('email')}}</span>
        </div>

    </div>
</div>

<!-- MAIN NAVBAR -->
<nav class="bg-white sticky top-0 z-50">

    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">

        <!-- LOGO -->
        <img src="{{ settings('home_banner1') ? asset('storage/'.settings('home_banner1')) : 'https://via.placeholder.com/150' }}"
                             class="h-24 rounded-full w-24 border border-gray-400 cursor-pointer">
        <!-- SEARCH -->
        <form action="{{route('products.search')}}" class="hidden md:flex w-[600px]">
            <input
                type="search"
                name="search"
                value=""
                placeholder="Search"
                class="w-full border rounded-lg border-gray-400 px-5 py-3 text-lg focus:outline-none"
            >
            <button class="bg-blue-600 rounded-lg hover:bg-blue-700 text-white px-6 text-xl">
                <i class="fa fa-search"></i>
            </button>
        </form>

        <!-- RIGHT ICONS -->
        <div class="flex items-center  gap-8 text-blue-600">

            <a href="#">
                <i class="fa fa-bell text-3xl"></i>
            </a>

            <a href="#">
                <i class="fa fa-shopping-cart text-3xl"></i>
            </a>

            <!-- AUTH -->
            @auth
            <div class="relative" x-data="{ open: false }">

                <!-- Avatar -->
                <div
                    @click="open = !open"
                    class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold cursor-pointer"
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
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                        Settings
                    </a>
@unlessrole('user')
                    <a href="{{route('dashboard')}}" class="block px-4 py-2 hover:bg-gray-100">
                        Dashboard
                    </a>
@endunlessrole
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
            <a href="/login" class="text-blue-600">
                <i class="fa fa-user-plus text-3xl"></i>
            </a>
            @endauth

        </div>

    </div>

    <!-- MENU -->
    <div class="bg-[#1f5ea8] text-white">
        <div class="max-w-7xl mx-32 px-1">

            <ul class="flex flex-wrap gap-5 py-6 text-[23px] font-medium">

                <li>
                    <a href="/" class="hover:text-gray-200 transition">
                        Home
                    </a>
                </li>

                <!-- CATEGORY -->
                <x-categorymenu/>
                <!-- BRANDS -->
              <x-brandmenu/>

                <li>
                    <a href="/about" class="hover:text-gray-200 transition">
                        About Us
                    </a>
                </li>

                <li>
                    <a href="{{route('pages.contact')}}" class="hover:text-gray-200 transition">
                        Contact Us
                    </a>
                </li>

                <li>
                    <a href="/emi" class="hover:text-gray-200 transition">
                        EMI
                    </a>
                </li>

                <li>
                    <a href="{{route('frontend.blogs.blogs')}}" class="hover:text-gray-200 transition">
                        Blogs
                    </a>
                </li>

                <li>
                    <a href="{{route('frontend.repairs.repair')}}" class="hover:text-gray-200 transition">
                        Book a Repair
                    </a>
                </li>

            </ul>

        </div>
    </div>

</nav>
