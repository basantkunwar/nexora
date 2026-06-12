@extends('layouts.frontend')

@section('content')
<section
    x-data="{
        active: 0,
        slides: [
            '{{ asset('storage/' . settings('home_banner1')) }}',
            '{{ asset('storage/' . settings('home_banner2')) }}',
            '{{ asset('storage/' . settings('home_banner3')) }}'
        ],
        init() {
            setInterval(() => {
                this.active = (this.active + 1) % this.slides.length;
            }, 4000);
        }
    }"
   class="relative w-full h-screen overflow-hidden -mt-[170px]">
>

    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <img
            :src="slide"
            x-show="active === index"
            x-transition:enter="transition-opacity duration-1000"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-1000"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0 w-full h-full object-cover"
            alt="Banner"
        >
    </template>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Content -->
    <div class="absolute inset-0 flex items-center justify-center z-10">
        <div class="text-center text-white">
            <h1 class="text-5xl font-bold">
            {{ settings('project') }}
            </h1>
            <p class="mt-4 text-xl">
            {{ settings('description') }}
            </p>
        </div>
    </div>

    <!-- Previous Button -->
    <button
        @click="active = active === 0 ? slides.length - 1 : active - 1"
        class="absolute left-5 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/30 text-white w-12 h-12 rounded-full"
    >
        ❮
    </button>

    <!-- Next Button -->
    <button
        @click="active = (active + 1) % slides.length"
        class="absolute right-5 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/30 text-white w-12 h-12 rounded-full"
    >
        ❯
    </button>

    <!-- Dots -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button
                @click="active = index"
                :class="active === index ? 'bg-white' : 'bg-white/40'"
                class="w-3 h-3 rounded-full"
            ></button>
        </template>
    </div>

</section>
{{-- category slide --}}
<section class="py-6 bg-white">
    <div class="px-4 sm:px-6 lg:px-8">

        <h2 class="text-2xl font-bold mb-6">
            Categories
        </h2>

        <div class="relative">

            <x-categoryslide />

            <div class="category-prev swiper-button-prev"></div>
            <div class="category-next swiper-button-next"></div>

        </div>

    </div>
</section>

<br>
{{-- all productcts --}}
<section class="py-6 bg-white">
    <div class="px-4 sm:px-6 lg:px-8">

        <h2 class="text-2xl font-bold mb-6">
            All Products
        </h2>

        <div class="relative">

            <x-allproductsslide />

            <div class="category-prev swiper-button-prev"></div>
            <div class="category-next swiper-button-next"></div>

        </div>

    </div>
</section>



{{-- brands--}}
<section class="py-6 bg-white">
    <div class="px-4 sm:px-6  lg:px-8">

        <h2 class="text-2xl font-bold mb-6">
            Brands
        </h2>

        <div class="relative">

            <x-brandslide />

            <div class="category-prev swiper-button-prev"></div>
            <div class="category-next swiper-button-next"></div>

        </div>

    </div>
</section>




{{-- letest products --}}
<section class="py-6 bg-white">
    <div class="px-4 pb-6 sm:px-6 lg:px-8">

        <h2 class="text-2xl font-bold mb-6">
            Letest Products
        </h2>

        <div class="relative">

            <x-leteastproducts/>

            <div class="category-prev swiper-button-prev"></div>
            <div class="category-next swiper-button-next"></div>

        </div>

    </div>
</section>



{{-- vlogs are  --}}
<section class="py-6 bg-white">
    <div class="px-4 pb-6 sm:px-6 lg:px-8">

        <h2 class="text-2xl font-bold mb-6">
            blogs are
        </h2>

        <div class="relative">

            <x-blogcomponent/>

            <div class="category-prev swiper-button-prev"></div>
            <div class="category-next swiper-button-next"></div>

        </div>

    </div>
</section>




















<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">

            <!-- FEATURE 1 -->
            <div class="flex flex-col items-center">
                
                <div class="w-20 h-20 rounded-full bg-blue-600 flex items-center justify-center shadow-lg">
                    <!-- Truck Icon -->
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7h12v10H3V7zm12 3h4l2 2v5h-6V10zM5 17a2 2 0 100 4 2 2 0 000-4zm12 0a2 2 0 100 4 2 2 0 000-4z"/>
                    </svg>
                </div>

                <h3 class="mt-5 text-2xl font-bold text-gray-900">
                    Fast Delivery
                </h3>

                <p class="mt-3 text-gray-500 max-w-sm">
                    Enjoy fast delivery all over Nepal with our reliable shipping network.
                </p>
            </div>

            <!-- FEATURE 2 -->
            <div class="flex flex-col items-center">

                <div class="w-20 h-20 rounded-full bg-blue-600 flex items-center justify-center shadow-lg">
                    <!-- Shield Icon -->
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 2l7 4v6c0 5-3 9-7 10-4-1-7-5-7-10V6l7-4z"/>
                    </svg>
                </div>

                <h3 class="mt-5 text-2xl font-bold text-blue-600">
                    100% Genuine
                </h3>

                <p class="mt-3 text-gray-500 max-w-sm">
                    Trust us with only genuine and authentic products from verified suppliers.
                </p>
            </div>

            <!-- FEATURE 3 -->
            <div class="flex flex-col items-center">

                <div class="w-20 h-20 rounded-full bg-blue-600 flex items-center justify-center shadow-lg">
                    <!-- Tag Icon -->
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 7h10l4 4-10 10-4-4V7z"/>
                    </svg>
                </div>

                <h3 class="mt-5 text-2xl font-bold text-gray-900">
                    Discounts & Offers
                </h3>

                <p class="mt-3 text-gray-500 max-w-sm">
                    Exclusive discounts and offers on every occasion and special events.
                </p>
            </div>

        </div>

    </div>
</section>
@endsection