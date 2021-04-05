@extends('layouts.app')

@section('content')
    <a href="/noticias" class="btn btn-secondary float-right">Voltar</a>
    <h1>{{$noticia->titulo}}</h1>
    <div>
        <p>{{$noticia->conteudo}}</p>
    </div>
    <hr>
    <div>
        <small>Escrito por {{$name}} as {{$noticia->created_at}}</small>
    </div>
    @if (!Auth::guest())
        @if (Auth::user()->id == $noticia->user_id)
            <a href="/noticias/{{$noticia->id}}/edit" class="btn btn-secondary float-left">Editar</a>

            {!! Form::open(['action' => ['NoticiasController@destroy', $noticia->id], 'method' => 'POST']) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
            {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
        @endif
    @endif
    {!! Form::close() !!}
@endsection