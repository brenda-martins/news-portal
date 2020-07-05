@extends('site.master.master')

@section('content')
<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-7 recent-news">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            @foreach($latestNews as $new)
                            <div class="carousel-item active">
                                <a href="#" class="lazy-img">
                                    <img src="" data-url="{{ env('APP_URL')}}/storage/{{$new->image}}" class="d-block w-100" alt="...">
                                </a>
                                <div class="carousel-caption d-md-block">
                                    <div><span>{{$new->category()->first()->name}}</span></div>
                                    <div>
                                        <h5><a href="{{ route('web.post.show', ['post' => $new->id, 'slug' => $new->slug]) }}">{{$new->title}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
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
                                    <h5> <a href="#"> {{$item->title}} </a></h5>
                                </div>
                                <div class="news-info">
                                    <span>
                                        <a>{{ date_format( $item->created_at, 'D/M/Y') }}</a>
                                    </span>
                                    <span>
                                        <a href="">{{$item->category()->first()->name}}</a>
                                    </span>
                                    <span>
                                        <a href="">{{$item->author}}</a>
                                    </span>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>

                    <div class="col opnion">
                        <h4 class="title-sections">opnião</h4>
                        <div class="row">
                            <div class="col-3 opnion-author">
                                <img src="{{ env('APP_URL')}}/storage/news4.jpg" alt="">
                                <p>Autor</p>
                            </div>
                            <div class="col">
                                <h5>A nova teoria sobre o sorriso da ‘Mona Lisa’ de Leonardo da Vinci
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 opnion-author">
                                <img src="{{ env('APP_URL')}}/storage/news4.jpg" alt="">
                                <p>Autor</p>
                            </div>
                            <div class="col">
                                <h5>A nova teoria sobre o sorriso da ‘Mona Lisa’ de Leonardo da Vinci
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 opnion-author">
                                <img src="{{ env('APP_URL')}}/storage/news4.jpg" alt="">
                                <p>Autor</p>
                            </div>
                            <div class="col">
                                <h5>A nova teoria sobre o sorriso da ‘Mona Lisa’ de Leonardo da Vinci
                                </h5>
                            </div>
                        </div>
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
@endsection