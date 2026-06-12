<div class="swiper Swiper mt-8">
    <div class="swiper-wrapper">

        @foreach($brands as $brand)
         <div class="swiper-slide">
        <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-6 hover:shadow-xl hover:-translate-y-2 transition duration-300">

            <!-- Image Container -->
            <div class="flex justify-center items-center bg-gray-50 rounded-xl p-4">
                <img src="{{ asset('storage/'.$brand->image) }}"
                     alt="{{ $brand->name }}"
                     class="h-28 w-28 object-contain transition duration-300 hover:scale-105">
            </div>

            <!-- Title -->
            <h3 class="mt-4 text-center font-semibold text-lg text-slate-800 capitalize">
                {{ $brand->name }}
            </h3>

        </div>
         </div>
        @endforeach
    </div>
</div>