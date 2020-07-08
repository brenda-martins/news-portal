@extends('authors.master.master')

@section('content')
<div class="container">

    <form id="regForm" method="post" action="{{ route('author.post.update', ['post' => $post->id]) }}" style="width: 100%;" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-8">
                <h4 style="margin-top: 4%;">Editar postagem</h4>
                <hr>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label>Título da publicação</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form-group" style="margin-bottom: 20px;">

                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <textarea id="mytextarea" style="min-height: 750px;" name="content" class="@error('content') is-invalid @enderror">
                        <p>{{ $post->content }}</p>
                    </textarea>
                </div>
            </div>



            <div class="col">

                <div class="card" style="margin-top: 6%;">
                    <div class="card-header">
                        Publicar postagem
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="spotlight" value="{{ $post->spotlight }}" @if ($post->spotlight > 0) checked @endif>
                            <label class="form-check-label">
                                Destacar postagem
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label">
                                Enviar notificação
                            </label>
                        </div>
                        <hr>
                        <a class="btn-cancel" href="{{ route('author.post.list') }}">Cancelar</a>
                        <a class="btn-remove">Excluir publicação</a>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit">Salvar alterações</button>
                    </div>
                </div>

                <div class="card" style="margin-top: 6%;">
                    <div class="card-header">
                        Categoria
                    </div>

                    @error('category')
                    <span style="display: block; width: 100%;  margin-top: 0.25rem; font-size: 80%;  color: #e3342f; text-align: center;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="card-body">
                        @foreach($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input @error('category') is-invalid @enderror" type="radio" name="category" value="{{ $category->id }}" @if($post->category === $category->id) checked @endif>
                            <label class="form-check-label" for="exampleRadios1">
                                {{ $category->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="card" style="margin-top: 6%;">
                    <div class="card-header">
                        Imagem da publicação
                    </div>
                    <div class="card-body">

                        <div class="featured-image">
                            <img id="blah" src="{{env('APP_URL')}}/storage/{{$post->image}}" />
                            <input type='file' onchange="readURL(this);" name="file" value="{{ $post->image }}" class="@error('file') is-invalid @enderror" />
                            @error('file')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection


@section('scripts')
<script src="https://cdn.tiny.cloud/1/82bmftj7j05pf47ku4ygtxfofvka9eon163ecel5xatsaxxm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea'

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection