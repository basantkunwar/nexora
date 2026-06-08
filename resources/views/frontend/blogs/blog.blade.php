@extends('layouts.frontend')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-12">

    <!-- Heading -->
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-slate-900">
        letest Blogs
        </h1>
        <p class="text-slate-500 mt-2">
            Explore news, technology updates, reviews and articles.
        </p>
    </div>

    <!-- Blog Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($blogs as $blog)
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 flex flex-col">

    <!-- Blog Image -->
    <img src="{{ asset('storage/'.$blog->image) }}"
         alt="{{ $blog->title }}"
         class="w-full h-52 object-cover">

    <!-- Content -->
    <div class="p-5 flex flex-col flex-1">

        <!-- Date -->
        <div class="flex items-center text-sm text-slate-500 mb-3">
            📅 {{ $blog->created_at->format('Y-m-d') }}
        </div>

        <!-- Title -->
        <h2 class="text-xl font-bold text-slate-900 mb-2">
            {{ $blog->title }}
        </h2>

        <!-- Description -->
        <p class="text-slate-500 text-sm flex-1">
            {{ Str::limit(strip_tags($blog->description), 100) }}
        </p>

        <!-- Button (BOTTOM FULL WIDTH) -->
        <a href="{{ route('frontend.blogs.blogdetails', $blog->id) }}"
           class="mt-5 w-full block text-center bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 rounded-full transition">
            View
        </a>

    </div>

</div>
        @endforeach

    </div>

</div>
<x-cart/>
@endsection