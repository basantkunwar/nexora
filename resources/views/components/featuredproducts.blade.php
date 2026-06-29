<div class="flex justify-between">
    <h2 class="text-2xl font-bold mb-6">{{$featured->title}}</h2>
  <a href="{{route('frontend.category.index',$featured->category_id)}}" class="inline-flex items-center px-4 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-xl transition-all duration-200 shadow-sm">
    <i class="fa-solid fa-eye mr-2"></i>
    View
</a></div>
<div class="swiper Swiper mt-8">
    <div class="swiper-wrapper">

@foreach($products as $product)
<x-cart :product="$product" />
@endforeach
 </div>
</div>