<div class="swiper Swiper mt-8">
    <div class="swiper-wrapper">

@foreach($products as $product)
<x-cart :product="$product" />
@endforeach
 </div>
</div>