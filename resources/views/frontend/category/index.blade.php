@extends('layouts.frontend')
@section('content')
<x-brandpage :products="$products" :brand="$category" />

@endsection