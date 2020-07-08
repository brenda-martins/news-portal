@extends('authors.master.master')

@section('content')

<div class="container">

    <form id="regForm" method="post" action="{{ route('author.post.store') }}" style="width: 100%;" enctype="multipart/form-data">
        @csrf

        @if(session()->has('message'))
        <span class="message error" role="alert" style="margin-top: 20px;">
            <strong>{{ session()->get('message') }}</strong>
        </span>
        @endif

        <div class="row">
            <div class="col-8">
                <h4 style="margin-top: 4%;">Adicionar postagem</h4>
                <hr>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label>Título da publicação</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label>Conteúdo</label>

                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <textarea id="mytextarea" name="content" class="@error('content') is-invalid @enderror">
                {{ old('content')}}
                </textarea>
            </div>



            <div class="col">

                <div class="card" style="margin-top: 6%;">
                    <div class="card-header">
                        Publicar postagem
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="spotlight" value="true">
                            <label class="form-check-label">
                                Destacar postagem
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Enviar notificação
                            </label>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit">criar postagem</button>
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
                        <div class="form-check">
                            @foreach($categories as $category)
                            <div>
                                <input class="form-check-input @error('category') is-invalid @enderror" type="radio" name="category" value="{{$category->id}}">
                                <label class="form-check-label">
                                    {{ $category->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-top: 6%;">
                    <div class="card-header">
                        Imagem da publicação
                    </div>
                    <div class="card-body">

                        <div class="featured-image">
                            <img id="blah" />
                            <input type='file' onchange="readURL(this);" name="file" class="@error('file') is-invalid @enderror" />
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
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
        selector: '#mytextarea',
        height: 700,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help'


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