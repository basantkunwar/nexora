<li class="relative group">

    <a class="cursor-pointer hover:text-gray-200 transition flex items-center gap-1">
        Brands
        <i class="fa-solid fa-chevron-down text-xs"></i>
    </a>

    <!-- Dropdown -->
    <div class="absolute left-0 top-full hidden group-hover:block bg-white shadow-xl rounded-lg min-w-[250px] z-50">

        @forelse($brands as $brand)

            <a href="{{route('frontend.brand.index',$brand->id)}}"
               class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-light-400 hover:text-black transition">

                <img src="{{ asset('storage/'.$brand->image) }}"
                     alt=""
                     class="w-8 h-8 object-cover rounded border border-slate-200">

                <span class="text-sm font-medium">
                    {{ $brand->name }}
                </span>

            </a>

        @empty
            <span class="block px-5 py-3 text-gray-500">
                No Brands Found
            </span>
        @endforelse

    </div>

</li>