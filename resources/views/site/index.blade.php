@extends('site.master.master')

@section('content')
<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-7 recent-news">

                    <div id="latestNews" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php for ($i = 0; $i < count($latestNews); $i++) : ?>
                                <div class="carousel-item  @if($i==0) {{'active'}} @endif">
                                    <a href="#" class="lazy-img">
                                        <img src="" data-url="{{ env('APP_URL')}}/storage/{{$latestNews[$i]->image}}" class="d-block w-100">
                                    </a>
                                    <div class="carousel-caption d-md-block">
                                        <div>
                                            <span>{{$latestNews[$i]->category()->first()->name}}</span>
                                        </div>
                                        <div>
                                            <h5>
                                                <a href="{{ route('web.post.show', ['post' => $latestNews[$i]->id, 'slug' => $latestNews[$i]->slug]) }}">
                                                    {{$latestNews[$i]->title}}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>

                        <a class="carousel-control-prev" href="#latestNews" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#latestNews" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col  recent-news">
                    <h4 class="title-sections text-center">Economia</h4>
                    <div>
                        <h5>Noticia 1</h5>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque error earum aliquam velit, omnis labore at deserunt placeat. Perferendis quos placeat sapiente laboriosam ullam voluptates temporibus et quis accusamus quo.
                        </p>
                    </div>

                    <div>
                        <h5>Noticia 2</h5>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque error earum aliquam velit, omnis labore at deserunt placeat. Perferendis quos placeat sapiente laboriosam ullam voluptates temporibus et quis accusamus quo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="highlights">
            <div class="container">
                <div class="row">
                    <div class="col-7">
                        <h4 class="title-sections">Destaques</h4>
                        <div class="highlights-cards">
                            @foreach($highlights as $item)

                            <div class="highlights-content">
                                <div class="highlights-img lazy-img">
                                    <img src="" data-url="{{ env('APP_URL')}}/storage/{{$item->image}}" alt="">
                                </div>
                                <div class="highlights-text">
                                    <h5>
                                        <a href="{{ route('web.post.show', ['post' => $item->id, 'slug' => $item->slug]) }}">
                                            {{$item->title}}
                                        </a>
                                    </h5>
                                </div>

                                <div class="news-info">
                                    <span>
                                        <a>{{ date_format( $item->created_at, 'D/M/Y') }}</a>
                                    </span>
                                    <span>
                                        <a href="">{{$item->category()->first()->name}}</a>
                                    </span>
                                    <span>
                                        <a href="">{{$item->author()->first()->name}}</a>
                                    </span>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>

                    <div class="col opnion">
                        <h4 class="title-sections">opnião</h4>

                        @foreach($opinions as $opnion)
                        <div class="row">
                            <div class="col-3 opnion-author">
                                <img src="{{ env('APP_URL')}}/storage/{{$opnion->image}}">
                                <p>
                                    {{$opnion->author()->first()->name}}
                                </p>
                            </div>
                            <div class="col">
                                <h3>
                                    <a href="{{ route('web.post.show', ['post' => $item->id, 'slug' => $item->slug]) }}">
                                        {{ $opnion->title}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                        @endforeach

                        <div class="row opnion-bottom">
                            <a href="">Ver mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@section('scripts')
<script src="{{ asset('js/site/lazy-load.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 2000
    })
</script>
@endsection