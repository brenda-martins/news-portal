@extends('site.master.master')

@section('content')

<main class="container mt-5">

    <div class="row">
        <div class="col-9">

            <div class="post-title">
                <h1>{{$post->title}}</h1>
            </div>
            
            <div class="row post-info">
                <ul>
                    <li class="post-category">
                        <a href="#"> {{ $post->category()->first()->name }}</a>
                    </li>

                    <li>
                        <img style="width: 45px; height: 45px; border-radius: 50%" src="{{ env('APP_URL')}}/storage/{{ $post->image }}">
                        <span>
                            <a href="#"> {{ $post->author()->first()->name}} </a>
                        </span>
                    </li>

                    <li>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        {{ date_format($post->created_at, 'H:i:s')}}

                    </li>

                    <li>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        {{ date_format($post->created_at, 'd/m/Y')}}
                    </li>

                    <li>
                        <i class="fa fa-comments" aria-hidden="true"></i>
                    </li>
                </ul>
            </div>

            <div class="post-image">
                <img class="img-fluid" src="{{ env('APP_URL')}}/storage/{{ $post->image }}">
            </div>

            <div class="post-content">
                <?= $post->content; ?>
            </div>

        </div>
        <div class="col post-sidebar">
            <h1>Notícias Recentes</h1>

            @foreach($latestNews as $item)
            <div class="row">
                <a href="">
                    {{$item->title}}
                </a>
            </div>
            @endforeach
        </div>
    </div>

</main>
@endsection