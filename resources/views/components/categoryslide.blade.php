<div class="swiper Swiper mt-8">
    <div class="swiper-wrapper">

        @foreach($categories as $category)
        <div class="swiper-slide">
            
            <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-6 
                        hover:shadow-xl hover:-translate-y-2 transition duration-300 h-full">

                <div class="flex justify-center items-center bg-gray-50 rounded-xl p-4">
                    <img src="{{ asset('storage/'.$category->image) }}"
                         alt="{{ $category->name }}"
                         class="h-28 w-28 object-contain">
                </div>

                <h3 class="mt-4 text-center font-semibold text-lg text-slate-800">
                    {{ $category->name }}
                </h3>

            </div>

        </div>
        @endforeach

    </div>
</div>