<x-app-layout>

<div class="max-w-7xl mx-auto px-4 py-12">

    <form action="{{ route('blogs.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LEFT SECTION -->
            <div class="lg:col-span-2">

                <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-slate-200">

                    <!-- HEADER -->
                    <div class="bg-gradient-to-r from-slate-900 to-indigo-900 text-white p-6">
                        <h2 class="text-2xl font-bold">
                            Create Blog Post
                        </h2>
                        <p class="text-slate-300 text-sm mt-1">
                            Write about products, events, technology, news or any topic.
                        </p>
                    </div>

                    <!-- BODY -->
                    <div class="p-6 space-y-6">

                        <!-- TITLE -->
                        <div>
                            <label class="block font-semibold text-slate-700 mb-2">
                                Blog Title
                            </label>
                            <input type="text" name="title"
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Example: Future of AI in 2026">
                        </div>

                        <!-- SHORT DESCRIPTION -->
                        <div>
                            <label class="block font-semibold text-slate-700 mb-2">
                                Short Description
                            </label>
                            <textarea name="short_description" rows="3"
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Write a short introduction..."></textarea>
                        </div>

                        <!-- FULL CONTENT -->
                       

                        <!-- OPTIONAL EXTRA FIELD -->
                        <div>
                            <label class="block font-semibold text-slate-700 mb-2">
                                Key Points / Highlights
                            </label>
                            <textarea name="points" rows="5"
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Main points, features, or summary..."></textarea>
                        </div>

                    </div>
                </div>
            </div>

            <!-- RIGHT SECTION -->
            <div class="space-y-6">

                <!-- BLOG INFO -->
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-slate-200">

                    <div class="bg-indigo-600 text-white p-4 font-bold">
                        Blog Settings
                    </div>

                    <div class="p-5 space-y-4">

                        <!-- CATEGORY -->
                        <div>
                            <label class="block font-semibold mb-2 text-slate-700">
                                Category
                            </label>
                            <input type="text" name="category"
                                class="w-full border border-slate-300 rounded-lg px-3 py-2"
                                placeholder="Tech, Product, Event, News">
                        </div>

                        <!-- FEATURE IMAGE -->
                        <div>
                            <label class="block font-semibold mb-2 text-slate-700">
                                Feature Image
                            </label>
                            <input type="file" name="image"
                                class="w-full border border-slate-300 rounded-lg px-3 py-2">
                        </div>

                        <!-- YOUTUBE -->
                        <div>
                            <label class="block font-semibold mb-2 text-slate-700">
                                YouTube Link (optional)
                            </label>
                            <input type="url" name="youtube"
                                class="w-full border border-slate-300 rounded-lg px-3 py-2"
                                placeholder="https://youtube.com/...">
                        </div>

                    </div>
                </div>

                <!-- PUBLISH -->
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-slate-200">

                    <div class="bg-green-600 text-white p-4 font-bold">
                        Publish
                    </div>

                    <div class="p-5 space-y-4">

                        <!-- STATUS -->
                        <div>
                            <label class="block font-semibold mb-2 text-slate-700">
                                Status
                            </label>
                            <select name="status"
                                class="w-full border border-slate-300 rounded-lg px-3 py-2">
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <!-- TAGS -->
                        <div>
                            <label class="block font-semibold mb-2 text-slate-700">
                                Tags
                            </label>
                            <input type="text" name="tags"
                                class="w-full border border-slate-300 rounded-lg px-3 py-2"
                                placeholder="AI, Tech, Laravel, Business">
                        </div>

                        <!-- SUBMIT -->
                        <button type="submit"
                            class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold hover:bg-slate-800 transition">
                            Publish Blog
                        </button>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

</x-app-layout>