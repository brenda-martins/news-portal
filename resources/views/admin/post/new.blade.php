@extends('admin.master.master')

@section('content')

<div class="container">

    <form id="regForm" method="post" action="{{ route('admin.post.store') }}" style="width: 100%;" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-8">
                <h4 style="margin-top: 4%;">Adicionar postagem</h4>
                <hr>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label>Título da publicação</label>
                    <input type="text" class="form-control" name="title">
                </div>


                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="exampleFormControlSelect1">Autor</label>
                    <input type="text" class="form-control" name="author">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <textarea id="mytextarea" style="min-height: 750px;" name="content">
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
                            <input class="form-check-input" type="checkbox" name="spotlight">
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
                        <button type="submit">Salvar alterações</button>
                    </div>
                </div>

                <div class="card" style="margin-top: 6%;">
                    <div class="card-header">
                        Categoria
                    </div>
                    <div class="card-body">
                        @foreach($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category">
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
                            <img id="blah" />
                            <input type='file' onchange="readURL(this);" name="file" />
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