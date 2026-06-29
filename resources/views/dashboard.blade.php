<x-app-layout>

    <x-slot name="pageTitle">
        Dashboard
    </x-slot>
    <div class="py-8 px-6 bg-slate-50 min-h-screen">
        <!-- Stats Grid -->
     @role('admin|super-admin|manager|employee')   
     <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">

            <!-- Products -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">
                            Total Products
                        </p>
                        <h2 class="text-3xl font-bold text-slate-900 mt-2">
                            {{$products->count()}}
                        </h2>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center">
                     <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </div>
            </div>

            <!-- Orders -->
            @isset($totalOrders)
                 <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">
                            Total Orders
                        </p>
                        <h2 class="text-3xl font-bold text-slate-900 mt-2">
                            {{ $totalOrders}}
                        </h2>
                    </div>
                </div>
            </div>
            @endisset

              {{-- @isset($grandTotal)
                 <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">
                        total revinew
                        </p>
                        <h2 class="text-3xl font-bold text-slate-900 mt-2">
                            {{ $grandTotal}}
                        </h2>
                    </div>
                </div>
            </div>
            @endisset --}}


            <!-- Users -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">
                            Total Users
                        </p>
                        <h2 class="text-3xl font-bold text-slate-900 mt-2">
                            {{ $user->count() }}
                        </h2>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center">
                     <i class="fa-solid fa-users"></i> 
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">
                            Total Categories
                        </p>
                        <h2 class="text-3xl font-bold text-slate-900 mt-2">
                           {{ $category->count()}}
                        </h2>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center">
                 <i class="fa-solid fa-tags"></i> 
                    </div>
                </div>
            </div>

            <!-- Brands -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">
                            Total Brands
                        </p>
                        <h2 class="text-3xl font-bold text-slate-900 mt-2">
                           {{ $brand->count() }}
                        </h2>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center">
                        <i class="fa-solid fa-star"></i> 
                    </div>
                </div>
            </div>

            <!-- Blogs -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">
                            Total Blogs
                        </p>
                        <h2 class="text-3xl font-bold text-slate-900 mt-2">
                            {{ $blog->count() }}
                        </h2>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center">
                       <i class="fa-solid fa-newspaper"></i> 
                    </div>
                </div>
            </div>

        </div>

        <!-- Recent Activity Section -->
       <div class="mt-10 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
    <h2 class="text-xl font-semibold text-slate-800 mb-4">
        Store Summary
    </h2>

    <ul class="divide-y divide-slate-200">

        <li class="flex justify-between items-center py-3">
            <span class="text-slate-600">Products</span>
            <span class="font-bold text-slate-900">{{ $products->count() }}</span>
        </li>

        <li class="flex justify-between items-center py-3">
            <span class="text-slate-600">Users</span>
            <span class="font-bold text-slate-900">{{ $user->count() }}</span>
        </li>

        <li class="flex justify-between items-center py-3">
            <span class="text-slate-600">Categories</span>
            <span class="font-bold text-slate-900">{{ $category->count() }}</span>
        </li>

        <li class="flex justify-between items-center py-3">
            <span class="text-slate-600">Brands</span>
            <span class="font-bold text-slate-900">{{ $brand->count() }}</span>
        </li>

        <li class="flex justify-between items-center py-3">
            <span class="text-slate-600">Blogs</span>
            <span class="font-bold text-slate-900">{{ $blog->count() }}</span>
        </li>

        

    </ul>
</div>
@endrole

<div class="mt-10 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
    <h2 class="text-xl font-semibold text-slate-800 mb-4">
        my Orders Summary
    </h2>

    <ul class="divide-y divide-slate-200">
        @isset($myTotalAmount)
        <li class="flex justify-between items-center py-3">
            <span class="text-slate-600">total purchase cost</span>
            <span class="font-bold text-slate-900"> {{ $myTotalAmount}}</span>
        </li>
        @endisset
@isset($myOrderCount)
        <li class="flex justify-between items-center py-3">
            <span class="text-slate-600">total orders</span>
            <span class="font-bold text-slate-900">{{$myOrderCount}}</span>
        </li>
        @endisset


    </ul>
</div>

        
    </div>

</x-app-layout>