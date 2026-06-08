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
@endsection
@section('contents')

@endsection