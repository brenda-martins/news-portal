@extends('site.master.master')

@section('content')

<main class="container mt-5">
    <div class="post-title">
        <h1>{{$post->title}}</h1>
    </div>

    <div class="post-image">
        <img class="img-fluid" src="{{ env('APP_URL')}}/storage/{{ $post->image }}">
    </div>

    <div class="post-content">
        {{ $post->content }}
    </div>
</main>
@endsection