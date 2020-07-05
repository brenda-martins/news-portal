@extends('admin.master.master')

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
                <!-- <th scope="col">#</th> -->
                <th scope="col-6">Título</th>
                <th scope="col">Categoria</th>
                <th scope="col">Data</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)

            <tr>
                <!-- <th scope="row">{{$post->id}}</th> -->
                <td> {{$post->title}}</td>
                <td>{{ $post->category()->first()->name }}</td>
                <td>{{ date_format($post->created_at, 'd/m/y')}}</td>
                <td>
                    <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}">
                        <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                    </a>

                    <a href="#" style="color: red; margin-left: 5%;" onclick="event.preventDefault();
                                                                      document.getElementById('form_delete').submit();">
                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>

                        <form id="form_delete" method="post" action="{{ route('admin.post.destroy', ['post' => $post->id]) }}" style="display: none;">
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