@extends('layouts.frontend')

@section('content')
    
    <x-productspage :products="$products" :categories="$categories" :brands="$brands"/>
  
</div>
@endsection