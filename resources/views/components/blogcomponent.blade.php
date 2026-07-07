<div class="px-4 sm:px-6 lg:px-10 mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">

        @foreach($blogs as $blog)
        <div class="group">

            <div class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-slate-100 h-full flex flex-col">

                <!-- Image -->
                <div class="overflow-hidden">
                    <img src="{{ asset('storage/'.$blog->image) }}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>

                <!-- Content -->
                <div class="p-6 flex flex-col flex-1">

                    <div class="flex items-center text-sm text-slate-500 mb-3">
                        <i class="fa-regular fa-calendar mr-2 text-yellow-500"></i>
                        {{ $blog->created_at->format('M d, Y') }}
                    </div>

                    <h2 class="text-2xl font-bold text-slate-800 mb-3 line-clamp-2">
                        {{ $blog->title }}
                    </h2>

                    <p class="text-slate-600 leading-7 flex-1">
                        {{ Str::limit(strip_tags($blog->description), 120) }}
                    </p>

                    <a href="{{ route('frontend.blogs.blogdetails', $blog->id) }}"
                        class="mt-6 inline-flex justify-center items-center bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 rounded-xl transition-all duration-300">
                        Read More
                        <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>

                </div>

            </div>

        </div>
        @endforeach

    </div>
</div>