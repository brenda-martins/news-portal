@extends('authors.master.master')



@section('content')
<div class="post-manager">
    <h4>Gerenciar postagens</h4>
    <div>
        {{
            session()->get('status')
        }}
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Visualizações</th>
                <th scope="col">Título</th>
                <th scope="col">Categoria</th>
                <th scope="col">Data</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)

            <tr>
                <td style="width: 10%;">{{$post->visitors}}</td>
                <td style="width: 50%;"> {{$post->title}}</td>
                <td style="width: 10%;">{{ $post->category()->first()->name }}</td>
                <td style="width: 20%;">{{ date_format($post->created_at, 'd/m/Y : H:i:s')}}</td>
                <td style="width: 10%;">

                    <a href="{{ route('author.post.edit', ['post' => $post->id]) }}">
                        <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                    </a>

                    <a href="#" style="color: red; margin-left: 5%;" onclick="event.preventDefault();
                                                                      document.getElementById('form_delete').submit();">
                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>

                        <form id="form_delete" method="post" action="{{ route('author.post.destroy', ['post' => $post->id]) }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/admin/form.js')}}"></script>

@endsection