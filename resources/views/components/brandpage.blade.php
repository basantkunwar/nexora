<div class="px-4 sm:px-6 mt-8 lg:px-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
@foreach($products as $product)
<x-cart :product="$product" />
@endforeach

</div>
</div>