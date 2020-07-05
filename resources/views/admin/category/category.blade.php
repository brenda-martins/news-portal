@extends('admin.master.master')

@section('content')

<div style="margin: 5%;">
    <form method="post" action="{{ route('admin.category.store') }}">
        @csrf

        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <span>{{ $error }}</span>
            @endforeach
        </div>
        @endif

        <div class="form-group">
            <label>Nome da categoria</label>
            <input type="text" class="form-control" name="name">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<h2>Gerencias categorias</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Slug</th>
                <th>Data cadastro</th>
                <th>Ultima atualização</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <a href="#"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                    <a href="#" style="color: red; margin-left: 5%;"> <i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection