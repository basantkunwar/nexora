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
              <i class="fa-solid fa-chart-line"></i> Dashboard
            </a>

            <a href="#"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
             <i class="fa-solid fa-box"></i> Orders
            </a>

            <div x-data="{ openProducts: false }">

                <!-- Parent Menu -->
                <button
                    @click="openProducts = !openProducts"
                    class="w-full flex items-center justify-between px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">

                    <span class="flex items-center gap-3">
                        <i class="fa-solid fa-cart-shopping"></i> Products
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
                       <i class="fa-solid fa-eye text-white-500 text-sm"></i> view
                    </a>

                    <a href="#"
                        class="block px-4 py-2 text-sm text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition">
                        ⭐ Reviews
                    </a>

 <a href="{{ route('products.create') }}"
                        class="block px-4 py-2 text-sm text-slate-300 hover:text-white hover:bg-white/10 rounded-lg transition">
                        <i class="fa-solid fa-plus text-white-500 text-sm"></i> Add products
                    </a>

                </div>

            </div>

            <a href="{{ route('category.index') }}"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
             <i class="fa-solid fa-tags"></i> Categories
            </a>

<div x-data="{ open: false }" class="relative">

    <!-- MAIN BUTTON -->
    <button @click="open = !open"
        class="w-full flex items-center justify-between gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">

        <div class="flex items-center gap-3">
            <i class="fa-solid fa-shield-halved"></i>
            <span>User Management</span>
        </div>

        <i class="fa-solid fa-chevron-down text-xs"
           :class="{ 'rotate-180': open }"
           class="transition-transform duration-300"></i>
    </button>

    <!-- DROPDOWN -->
    <div x-show="open"
         x-transition
         class="mt-2 ml-8 space-y-2">

          <a href="{{route('users.index')}}"
           class="flex items-center gap-2 text-sm px-4 py-2 rounded-lg hover:bg-white/10 transition">
            <i class="fa-solid fa-users text-xs"></i>
            Users
        </a>

        <!-- Roles -->
        <a href="{{ route('roles.show') }}"
           class="flex items-center gap-2 text-sm px-4 py-2 rounded-lg hover:bg-white/10 transition">
            <i class="fa-solid fa-user-shield text-xs"></i>
            Roles
        </a>

        <!-- Permissions -->
        <a href="{{route('permissions.create')}}"
           class="flex items-center gap-2 text-sm px-4 py-2 rounded-lg hover:bg-white/10 transition">
            <i class="fa-solid fa-lock text-xs"></i>
            Permissions
        </a>

        <!-- Optional: Assign -->
       
    </div>
</div>

            <a href="{{ route('brands.index') }}"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
            <i class="fa-solid fa-star"></i> Brands
            </a>

            <a href="#"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
             <i class="fa-solid fa-envelope"></i> Messages
            </a>

            <div class="relative group">

    <!-- Main Blog Link -->
    <div x-data="{ open: false }" class="relative">

    <!-- MAIN BUTTON -->
    <button @click="open = !open"
        class="w-full flex items-center justify-between gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">

        <div class="flex items-center gap-3">
            <i class="fa-solid fa-newspaper"></i>
            <span>Blogs</span>
        </div>

        <i class="fa-solid fa-chevron-down text-xs transition-transform duration-300"
           :class="{ 'rotate-180': open }"></i>

    </button>

    <!-- DROPDOWN -->
    <div x-show="open"
         x-transition
         class="mt-2 ml-8 space-y-2">

        <!-- All Blogs -->
        <a href="{{ route('blogs.index') }}"
           class="flex items-center gap-2 text-sm px-4 py-2 rounded-lg hover:bg-white/10 transition">
            <i class="fa-solid fa-list text-xs"></i>
            All Blogs
        </a>

        <!-- Categories -->
        <a href="{{ route('blogs.categories.index') }}"
           class="flex items-center gap-2 text-sm px-4 py-2 rounded-lg hover:bg-white/10 transition">
            <i class="fa-solid fa-folder text-xs"></i>
            Categories
        </a>

        <!-- Tags -->
        <a href="{{ route('blogs.tags.index') }}"
           class="flex items-center gap-2 text-sm px-4 py-2 rounded-lg hover:bg-white/10 transition">
            <i class="fa-solid fa-tags text-xs"></i>
            Tags
        </a>

    </div>

</div>

            
            <a href=""
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
        <i class="fa-solid fa-sliders"></i> Sliders
            </a>


            
            <a href="{{route('blogs.index')}}"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
           <i class="fa-solid fa-rectangle-ad"></i> Advertisement banner
            </a>


            
            {{-- <a href="{{route('blogs.index')}}"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
              <i class="fa-solid fa-newspaper"></i> cate lo
            </a> --}}

            <a href="{{route('settings.index')}}"
                class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
             <i class="fa-solid fa-gear"></i> Settings
            </a>

        </nav>

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
                <h1 class="text-3xl font-bold">
                   <i class="fa-solid fa-bars"></i>
                 
   {{  ucwords(str_replace('.', ' ', Route::currentRouteName())) }}
</h1>
              

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
               <div class="relative">
    
   <div id="profileContainer" class="relative">

    <!-- Profile Logo -->
    <button type="button" onclick="toggleProfileDropdown()" class="flex items-center gap-3">
        <div
            class="w-12 h-12 rounded-full bg-gradient-to-r from-violet-600 to-indigo-500 text-white flex items-center justify-center font-bold shadow-lg">
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
        </div>
    </button>

    <!-- Dropdown Menu -->
    <div id="profileDropdown"
         class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border overflow-hidden z-50">

        <a href="{{ url('/') }}"
           class="block px-4 py-3 hover:bg-gray-100">
            <i class="fa-solid fa-house text-blue-500 mr-2"></i> Home
        </a>

        <a href="{{ route('profile.edit') }}"
           class="block px-4 py-3 hover:bg-gray-100">
            <i class="fa-solid fa-user text-violet-500 mr-2"></i> Profile
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full text-left px-4 py-3 hover:bg-gray-100">
                <i class="fa-solid fa-right-from-bracket text-red-500 mr-2"></i> Logout
            </button>
        </form>

    </div>

</div>
<script>
function toggleProfileDropdown() {
    document.getElementById('profileDropdown').classList.toggle('hidden');
}

document.addEventListener('click', function (e) {
    const container = document.getElementById('profileContainer');
    const dropdown = document.getElementById('profileDropdown');

    if (!container.contains(e.target)) {
        dropdown.classList.add('hidden');
    }
});
</script>
</div>

        </header>

        <!-- Page Content -->
        <main class="p-8">
            {{ $slot }}
        </main>

    </div>

</div>
