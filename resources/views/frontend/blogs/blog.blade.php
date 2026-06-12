@extends('layouts.frontend')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-12">

    <!-- Heading -->
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-slate-900">
        letest Blogs
        </h1>
        <p class="text-slate-500 mt-2">
            Explore news, technology updates, reviews and articles.
        </p>
    </div>

    <!-- Blog Grid -->
    

  <x-blogcomponent/>
    

</div>
@endsection