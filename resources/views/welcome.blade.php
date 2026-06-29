@extends('layouts.frontend')

@section('content')
{{-- slider test --}}
<section
    x-data="{
        active: 0,
        total: {{ $sliders->count() }},
        init() {
            if(this.total > 1){
                setInterval(() => {
                    this.active = (this.active + 1) % this.total;
                }, 5000);
            }
        }
    }"
    class="relative w-full overflow-hidden bg-gray-100">

    {{-- Slides --}}
    <div class="relative h-[250px] sm:h-[350px] lg:h-[550px]">

        @foreach($sliders as $index => $slider)

            @php

                $textColor = match($slider->text_color){
                    'black' => 'text-black',
                    'red' => 'text-red-500',
                    'green' => 'text-green-500',
                    'blue' => 'text-blue-500',
                    'yellow' => 'text-yellow-400',
                    'orange' => 'text-orange-500',
                    'purple' => 'text-purple-500',
                    'pink' => 'text-pink-500',
                    'brown' => 'text-amber-700',
                    'gray' => 'text-gray-500',
                    default => 'text-white'
                };

                $alignment = match($slider->text_alignment){
                    'center' => 'items-center text-center',
                    'right' => 'items-end text-right',
                    default => 'items-start text-left'
                };

            @endphp

           <div
    x-show="active === {{ $index }}"
    x-transition:enter="transition ease-out duration-700"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="absolute inset-0">

    <a href="{{ $slider->button_link ?: '#' }}"
       target="_blank"
       class="block absolute inset-0">

        {{-- Desktop Image --}}
        <img
            src="{{ asset('storage/'.$slider->desktop_image) }}"
            class="hidden md:block w-full h-full object-cover"
            alt="{{ $slider->title }}">

        {{-- Mobile Image --}}
        <img
            src="{{ asset('storage/'.($slider->mobile_image ?: $slider->desktop_image)) }}"
            class="block md:hidden w-full h-full object-cover"
            alt="{{ $slider->title }}">

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/40"></div>

        {{-- Content --}}
        <div class="absolute inset-0 flex {{ $alignment }}">
            <div class="container mx-auto px-6 lg:px-16 flex flex-col justify-center h-full max-w-7xl">

                <div class="max-w-2xl">

                    {{-- @if($slider->title)
                        <h2 class="text-3xl md:text-5xl font-bold mb-4 {{ $textColor }}">
                            {{ $slider->title }}
                        </h2>
                    @endif

                    @if($slider->subtitle)
                        <p class="text-sm md:text-lg mb-6 {{ $textColor }}">
                            {{ $slider->subtitle }}
                        </p>
                    @endif --}}

                    {{-- @if($slider->button_text)
                        <span
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition">
                            {{ $slider->button_text }}
                        </span>
                    @endif --}}

                </div>

            </div>
        </div>

    </a>

</div>
        @endforeach

    </div>

    {{-- Previous --}}
    <button
        @click="active = (active - 1 + total) % total"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur p-3 rounded-full text-white hover:bg-white/30">

        ❮
    </button>

    {{-- Next --}}
    <button
        @click="active = (active + 1) % total"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur p-3 rounded-full text-white hover:bg-white/30">

        ❯
    </button>

    {{-- Dots --}}
    <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2">

        @foreach($sliders as $index => $slider)

            <button
                @click="active = {{ $index }}"
                :class="active === {{ $index }}
                    ? 'bg-white w-8'
                    : 'bg-white/50 w-3'"
                class="h-3 rounded-full transition-all duration-300">
            </button>

        @endforeach

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


{{-- letest products  --}}

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



{{-- top advertise banner --}}
@if($topBanner->isNotEmpty())

<section class="py-8 bg-white">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

        @foreach($topBanner as $banner)

            <a href="{{ $banner->url }}" class="block group">

                <div class="relative overflow-hidden rounded shadow-lg">

                    <img
                        src="{{ asset('storage/'.$banner->image) }}"
                        alt="Advertisement Banner"
                        class="w-full h-[320px] md:h-[340px] lg:h-[420px]
                               object-fill transition-all duration-500 ease-out
                hover:scale-105">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition duration-300"></div>

                </div>

            </a>

        @endforeach

    </div>
</section>

@endif
<br>





{{-- category featured products --}}
<section class="py-6 bg-white">
    <div class="px-4 sm:px-6 lg:px-8">

        <h2 class="text-2xl font-bold mb-6">
            
        </h2>

        <div class="relative">

            <x-featuredproducts />

            <div class="category-prev swiper-button-prev"></div>
            <div class="category-next swiper-button-next"></div>

        </div>

    </div>
</section>





{{-- topbellow advertise banner --}}
@if($belowTopBanner->isNotEmpty())

<section class="py-8 bg-white">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

        @foreach($belowTopBanner as $banner)

            <a href="{{ $banner->url }}" class="block group">

                <div class="relative overflow-hidden rounded shadow-lg">

                    <img
                        src="{{ asset('storage/'.$banner->image) }}"
                        alt="Advertisement Banner"
                        class="w-full h-[320px] md:h-[340px] lg:h-[420px]
                               object-fill transition-all duration-500 ease-out
                hover:scale-105">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition duration-300"></div>

                </div>

            </a>

        @endforeach

    </div>
</section>

@endif

{{-- brands featured products --}}
<section class="py-6 bg-white">
    <div class="px-4 sm:px-6 lg:px-8">

        <h2 class="text-2xl font-bold mb-6">
            
        </h2>

        <div class="relative">

            <x-brandfeaturesection />

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


{{--middele advertise banner --}}
@if($middleBanner->isNotEmpty())

<section class="py-8 bg-white">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

        @foreach($middleBanner as $banner)

            <a href="{{ $banner->url }}" class="block group">

                <div class="relative overflow-hidden rounded shadow-lg">

                    <img
                        src="{{ asset('storage/'.$banner->image) }}"
                        alt="Advertisement Banner"
                        class="w-full h-[260px] md:h-[340px] lg:h-[420px]
                               object-cover transition-all duration-500 ease-out
                hover:scale-105">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition duration-300"></div>

                </div>

            </a>

        @endforeach

    </div>
</section>

@endif




{{-- all productcts --}}
<section class="py-6 bg-white">
    <div class="px-4 sm:px-6 lg:px-8">
<div class="flex justify-between">
        <h2 class="text-2xl font-bold mb-6">
            All Products
        </h2>
        <a href="{{route('products.search')}}" class="inline-flex items-center px-4 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-xl transition-all duration-200 shadow-sm">
    <i class="fa-solid fa-eye mr-2"></i>
    View
</a>
</div>
        <div class="relative">

            <x-allproductsslide />

            <div class="category-prev swiper-button-prev"></div>
            <div class="category-next swiper-button-next"></div>

        </div>

    </div>
</section>


{{-- bellow middle advertise banner --}}
@if($belowMiddleBanner->isNotEmpty())

<section class="py-8 bg-white">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

        @foreach($belowMiddleBanner as $banner)

            <a href="{{ $banner->url }}" class="block group">

                <div class="relative overflow-hidden rounded shadow-lg">

                    <img
                        src="{{ asset('storage/'.$banner->image) }}"
                        alt="Advertisement Banner"
                        class="w-full h-[260px] md:h-[340px] lg:h-[420px]
                               object-cover transition-all duration-500 ease-out
                hover:scale-105">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition duration-300"></div>

                </div>

            </a>

        @endforeach

    </div>
</section>

@endif


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


{{-- buttom advertise banner --}}
@if($bottomBanner->isNotEmpty())

<section class="py-8 bg-white">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

        @foreach($bottomBanner as $banner)

            <a href="{{ $banner->url }}" class="block group">

                <div class="relative overflow-hidden rounded shadow-lg">

                    <img
                        src="{{ asset('storage/'.$banner->image) }}"
                        alt="Advertisement Banner"
                        class="w-full h-[260px] md:h-[340px] lg:h-[420px]
                               object-cover transition-all duration-500 ease-out
                hover:scale-105">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition duration-300"></div>

                </div>

            </a>

        @endforeach

    </div>
</section>

@endif



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