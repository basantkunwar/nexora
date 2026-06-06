<x-app-layout>

<div class="min-h-screen bg-slate-50 py-10 px-4">
    <div class="max-w-5xl mx-auto">


        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <!-- Card Header -->
            <div class="bg-indigo-600 text-white px-8 py-5">
                <h3 class="text-xl font-bold">
                    ➕ update products Information
                </h3>
                
            </div>

            <!-- Card Body -->
            <div class="p-8">

                <form action="{{ route('products.update',$product->id)}}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Product Name -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Product Name
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ $product->name}}"
                                   placeholder="Enter product name"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Brand -->
                       <x-createbrand/>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Product Price (Rs)
                            </label>

                            <input type="number"
                                   name="price"
                                   value="{{ $product->price }}"
                                   placeholder="Enter product price"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Discount -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Discount Price
                            </label>

                            <input type="text"
                                   name="discount"
                                   value="{{ $product->discount }}"
                                   placeholder="Optional"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Category -->
                        <x-createcategory/>

                        <!-- Stock -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Product Stock
                            </label>

                            <input type="number"
                                   name="stock"
                                   value="{{ $product->stock }}"
                                   placeholder="Available quantity"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Product Status
                            </label>

                            <select name="status" value="{{ old('status') , $product->status }}"
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="available">Available</option>
                                <option value="outofstock">OutOfStock</option>
                            </select>
                        </div>

                        {{-- current image --}}

<div class="mt-3">
    <h6>current image</h6>
    <img src="{{ asset('storage/'.$product->image) }}"
                                     class="w-12 h-12 rounded-lg object-cover border">
</div>

                        <!-- Image -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Product Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 file:mr-4 file:rounded-lg file:border-0 file:bg-indigo-600 file:px-4 file:py-2 file:text-white hover:file:bg-indigo-700">
                        </div>

                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Product Description
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  placeholder="Write product details here..."
                                  class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none">{{$product->description }}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-4 mt-8">

                        <button type="reset"
                                class="px-6 py-3 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 transition">
                            Reset
                        </button>

                        <button type="submit"
                                class="px-8 py-3 rounded-xl bg-indigo-600 text-white font-semibold shadow hover:bg-indigo-700 transition">
                            update Product
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

</x-app-layout>