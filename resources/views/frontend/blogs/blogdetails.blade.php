@extends('layouts.frontend')

@section('content')

<div class="max-w-6xl mx-auto px-4 py-10">

    <!-- HERO IMAGE -->
    <div class="rounded-3xl overflow-hidden shadow-lg">
        <img src="{{ asset('storage/'.$blog->image) }}"
             class="w-full h-[400px] object-cover"
             alt="{{ $blog->title }}">
    </div>

    <!-- CONTENT WRAPPER -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mt-10">

        <!-- LEFT CONTENT -->
        <div class="lg:col-span-2">

            <!-- CATEGORY + STATUS -->
            <div class="flex items-center gap-3 mb-4">

                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm rounded-full">
                    {{ $blog->blogcategory?->name }}
                </span>

                <span class="px-3 py-1 
                    {{ $blog->status == 'published' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}
                    text-sm rounded-full">
                    {{ ucfirst($blog->status) }}
                </span>

            </div>

            <!-- TITLE -->
            <h1 class="text-4xl font-bold text-slate-900">
                {{ $blog->title }}
            </h1>

            <!-- DATE -->
            <p class="text-slate-500 mt-2">
                📅 {{ $blog->created_at->format('d M Y') }}
            </p>

            <!-- KEY POINTS -->
            @if(!empty($blog->key_points))
            <div class="mt-8 bg-slate-50 border border-slate-200 rounded-2xl p-6">
                <h2 class="text-lg font-semibold mb-3">🔑 Key Points</h2>

                <ul class="list-disc pl-5 text-slate-700 space-y-2">
                    @foreach(explode("\n", $blog->points) as $point)
                        <li>{{ $point }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- DESCRIPTION -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-3">Description</h2>

                <div class="text-slate-700 leading-relaxed">
                    {!! $blog->description !!}
                </div>
            </div>

            <!-- TAGS -->
            @if(!empty($blog->tags))
            <div class="mt-8 flex flex-wrap gap-2">
                @foreach(explode(',', $blog->blogtags?->name) as $tag)
                    <span class="px-3 py-1 bg-slate-100 text-slate-700 text-sm rounded-full">
                        #{{ trim($tag) }}
                    </span>
                @endforeach
            </div>
            @endif

            <!-- RELATED BLOGS -->
            {{-- <div class="mt-12">

                <h2 class="text-2xl font-bold mb-5">Related Blogs</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    @foreach($relatedBlogs as $rblog)
                    <a href="{{ route('blog.show', $rblog->id) }}"
                       class="bg-white border rounded-xl p-4 hover:shadow-md transition">

                        <h3 class="font-semibold text-slate-800 line-clamp-2">
                            {{ $rblog->title }}
                        </h3>

                        <p class="text-sm text-slate-500 mt-2">
                            {{ Str::limit(strip_tags($rblog->description), 80) }}
                        </p>

                    </a>
                    @endforeach

                </div> --}}
{{-- 
            </div> --}}

        </div>

        <!-- RIGHT SIDEBAR -->
        <div>

            <!-- QUICK INFO CARD -->
            <div class="bg-white border rounded-2xl p-5 shadow-sm sticky top-10">

                <h3 class="text-lg font-bold mb-4">Blog Info</h3>

                <div class="space-y-3 text-sm text-slate-600">

                    <p><span class="font-semibold">Category:</span> {{ $blog->blogcategory?->name }}</p>
                    <p><span class="font-semibold">Status:</span> {{ $blog->status }}</p>
                    <p><span class="font-semibold">Created:</span> {{ $blog->created_at->format('d M Y') }}</p>

                </div>

                @if($blog->external_link)
                <a href="{{ $blog->external_link }}" target="_blank"
                   class="mt-5 block text-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl">
                    Visit Source
                </a>
                @endif

            </div>

        </div>

    </div>

</div>

@endsection