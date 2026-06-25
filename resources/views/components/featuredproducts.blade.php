<h2 class="text-2xl font-bold mb-6">{{$featured->title}}</h2>
<div class="swiper Swiper mt-8">
    <div class="swiper-wrapper">

@foreach($products as $product)
<x-cart :product="$product" />
@endforeach
 </div>
</div>