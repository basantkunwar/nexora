<div class="flex overflow-hidden min-h-screen bg-gradient-to-br from-slate-100 via-white to-indigo-50">

    <!-- Sidebar -->
    <aside class="w-72 bg-gradient-to-b from-slate-950 via-indigo-950 to-blue-950 text-white flex flex-col shadow-2xl">

        <!-- Logo -->
        <div class="px-8 py-8 border-b border-white/10">
            <h2 class="text-4xl font-extrabold tracking-tight">
                Nexora
            </h2>

            <p class="text-slate-400 text-sm mt-2">
                Admin Dashboard
            </p>
        </div>

        <!-- Menu -->
        <nav class="flex-1 px-4 py-6 space-y-2">

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-5 py-3 rounded-2xl bg-gradient-to-r from-violet-600 to-indigo-500 text-white font-medium shadow-lg shadow-indigo-500/30">
                📊 Dashboard
            </a>

            <a href="#"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                📦 Orders
            </a>

            <div x-data="{ openProducts: false }">

                <!-- Parent Menu -->
                <button
                    @click="openProducts = !openProducts"
                    class="w-full flex items-center justify-between px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">

                    <span class="flex items-center gap-3">
                        🛒 Products
                    </span>

                    <svg
                        class="w-4 h-4 transition-transform duration-300"
                        :class="{ 'rotate-180': openProducts }"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>

                </button>

                <!-- Dropdown -->
                <div
                    x-show="openProducts"
                    x-transition
                    class="ml-8 mt-3 space-y-2 border-l border-white/10 pl-4">

                    <a href="{{ route('products.index') }}"
                        class="block px-4 py-2 text-sm text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition">
                        📦 View Products
                    </a>

                    <a href="#"
                        class="block px-4 py-2 text-sm text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition">
                        ⭐ Reviews
                    </a>

                </div>

            </div>

            <a href="{{ route('category.index') }}"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                🏷 Categories
            </a>

            <a href="{{ route('users.index') }}"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                👥 Users
            </a>

            <a href="{{ route('brands.index') }}"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                ⭐ Brands
            </a>

            <a href="#"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                📈 Messages
            </a>

            <a href="{{route('blogs.index')}}"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                📝 Blogs
            </a>

            <a href="#"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                ⚙ Settings
            </a>

        </nav>

        <!-- Logout Section -->
        <div class="p-5 border-t border-white/10" x-data="{ openLogout: false }">

            <button
                @click="openLogout = !openLogout"
                class="w-full flex items-center justify-between gap-3 px-5 py-3 rounded-xl hover:bg-white/10 transition text-left">

                <span class="flex items-center gap-3">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Logout
                </span>

                <svg class="w-4 h-4 transition-transform"
                    :class="{ 'rotate-180': openLogout }"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>

            </button>

            <div
                x-show="openLogout"
                x-transition
                class="ml-6 mt-2 space-y-1">

                <a href="{{ route('profile.edit') }}"
                    class="block px-4 py-2 text-sm text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition">
                    👤 Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full text-left px-4 py-2 text-sm text-red-400 hover:text-white hover:bg-red-600 rounded-lg transition">
                        🚪 Log Out
                    </button>

                </form>

            </div>

        </div>

    </aside>

    <!-- Main Content -->
    <div class="flex-1 relative">

        <!-- Background Glow -->
        <div class="fixed bottom-0 right-0 w-96 h-96 bg-violet-300/20 blur-3xl rounded-full pointer-events-none"></div>
        <div class="fixed top-0 left-1/2 w-96 h-96 bg-blue-300/20 blur-3xl rounded-full pointer-events-none"></div>

        <!-- Header -->
        <header
            class="bg-white/80 backdrop-blur-xl border-b border-slate-200 px-10 py-6 flex items-center justify-between shadow-sm">

            <div>
                <h1 class="text-4xl font-bold text-slate-900">
                    @yield('page-title', 'Dashboard')
                </h1>

                <p class="text-slate-500 mt-1">
                    Welcome back, {{ Auth::user()->name }}
                </p>
            </div>

            <div class="flex items-center gap-5">

                <!-- Search -->
                <div class="hidden lg:block">
                    <div class="relative">

                        <input
                            type="text"
                            placeholder="Search here..."
                            class="w-80 pl-12 pr-4 py-3 rounded-2xl border border-slate-200 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">

                        <span class="absolute left-4 top-3.5 text-slate-400">
                            🔍
                        </span>

                    </div>
                </div>

                <!-- Notification -->
                <button
                    class="relative p-3 bg-white rounded-2xl shadow-md border border-slate-200 hover:shadow-lg transition">
                    🔔
                </button>

                <!-- User -->
                <div class="flex items-center gap-3">

                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-r from-violet-600 to-indigo-500 text-white flex items-center justify-center font-bold shadow-lg">
                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                    </div>

                    <div>
                        <h4 class="font-semibold text-slate-800">
                            {{ Auth::user()->name }}
                        </h4>

                        <p class="text-xs text-slate-500">
                            Administrator
                        </p>
                    </div>

                </div>

            </div>

        </header>

        <!-- Page Content -->
        <main class="p-8">
            {{ $slot }}
        </main>

    </div>

</div>
