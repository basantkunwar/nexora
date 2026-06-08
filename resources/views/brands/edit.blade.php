<x-app-layout>
<div class="min-h-screen bg-slate-50 p-6">

    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">
                update Brand
            </h1>
            
        </div>

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100">

            <!-- Top Banner -->
            <div class="bg-gradient-to-r from-indigo-600 to-violet-600 p-6">
                <h2 class="text-xl font-semibold text-white">
                    Brand Information
                </h2>

                <p class="text-sm text-white mt-1">
                    Update your brand information.
                </p>
            </div>

            <!-- Form -->
            <form action="{{ route('brands.update', $brand->id) }}') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-8">

                @csrf
@method('PUT')
                <!-- Brand Name -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Brand Name
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ $brand->name }}"
                           placeholder="Enter brand name"
                           class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition">

                    @error('name')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- current logo --}}
<div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Current Logo
                    </label>
                    <img src="{{ asset('storage/'.$brand->image) }}" alt="" class="w-28 h-28 object-cover rounded-2xl border border-slate-200">
                </div>
                <!-- Brand Logo -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Brand Logo
                    </label>

                    <input type="file"
                           name="image"
                           id="logo"
                           accept="image/*"
                           onchange="previewImage(event)"
                           class="block w-full text-sm text-slate-600
                                  file:mr-4 file:py-3 file:px-4
                                  file:rounded-xl file:border-0
                                  file:bg-indigo-600 file:text-white
                                  hover:file:bg-indigo-700">

                    @error('logo')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                    <!-- Preview -->
                    <div class="mt-4">
                        <img id="preview"
                             src="https://placehold.co/120x120?text=Logo"
                             class="w-28 h-28 object-cover rounded-2xl border border-slate-200">
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Write a short description..."
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-4 focus:ring-indigo-100 
                        focus:border-indigo-500 transition resize-none">{{ $brand->description }}</textarea>
                </div>

                <!-- Status -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Status
                    </label>

                    <select name="status"
                            class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500">
                        <option value="available" {{ $brand->status=='available' ? 'selected' : ''}}>
                        available
                        </option>

                        <option value="outofstock" {{ $brand->status=='outofstock' ? 'selected' : ''}}>
                            outofstock
                        </option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4">

                    <button type="reset"
                            class="px-6 py-3 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 transition">
                        Reset
                    </button>

                    <button type="submit"
                            class="px-8 py-3 rounded-xl bg-indigo-600 text-white font-medium shadow-lg hover:bg-indigo-700 transition">
                        Save Brand
                    </button>

                </div>

            </form>
        </div>

    </div>
</div>

<script>
function previewImage(event)
{
    const preview = document.getElementById('preview');

    preview.src = URL.createObjectURL(
        event.target.files[0]
    );
}
</script>
</x-app-layout>