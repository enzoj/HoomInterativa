@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($noticias) > 0)
    <div class="card-header">
        <h3>Suas notícias</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th>Título</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($noticias as $noticia)
            <tr>
                <td>{{$noticia->titulo}}</td>
                <td><a href="/noticias/{{$noticia->id}}/edit" class="btn btn-secondary">Editar</a></td>
                <td>
                    {!! Form::open(['action' => ['NoticiasController@destroy', $noticia->id], 'method' => 'POST']) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                </td>
            </tr>
            @endforeach
        </table>
        @else
            <div class="card-header text-center">Você ainda não tem notícias cadastradas</div>
            <div class="card-body">
                <a href="/noticias/create" class="btn btn-info">Criar notícia</a>
            </div>
        @endif
    </div>
</div>
@endsection
