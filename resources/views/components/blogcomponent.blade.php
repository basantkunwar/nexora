<div class="swiper Swiper px-4 sm:px-6 lg:px-10 mt-8 mt-8">
    <div class="swiper-wrapper  flex flex-wrap gap-6">

        @foreach($blogs as $blog)
        <div class="swiper-slide !h-auto">
            
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 flex flex-col h-full">

                <!-- Blog Image -->
                <img src="{{ asset('storage/'.$blog->image) }}"
                     class="w-full h-52 object-cover">

                <div class="p-5 flex flex-col flex-1">

                    <div class="text-sm text-slate-500 mb-3">
                        📅 {{ $blog->created_at->format('Y-m-d') }}
                    </div>

                    <h2 class="text-xl font-bold mb-2">
                        {{ $blog->title }}
                    </h2>

                    <p class="text-slate-500 text-sm flex-1">
                        {{ Str::limit(strip_tags($blog->description), 100) }}
                    </p>

                    <a href="{{ route('frontend.blogs.blogdetails', $blog->id) }}"
                       class="mt-5 w-full text-center bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 rounded-full">
                        View
                    </a>

                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>