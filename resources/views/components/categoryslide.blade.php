<div class="px-4 sm:px-6 mt-8 lg:px-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($categories as $category)
        <div class="bg-white w-72 border border-gray-200  shadow h-70 rounded-xl p-4 hover:shadow-xl transition duration-300">
            <a href="">
               <img src="{{ asset('storage/'.$category->image) }}"
             class="w-72 h-68 object-cover group-hover:scale-110 transition duration-500"
             alt="{{ $category->name }}">
             
            </a>
             <h3 class="font-semibold text-2xl text-center text-slate-800 line-clamp-2">
                    {{ $category->name }}
                </h3>
            
        </div>
        @endforeach
    </div>
</div>