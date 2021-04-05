@extends('layouts.app')

@section('content')
    <h1>Editar Notícia</h1>

    {!! Form::open(['action' => ['NoticiasController@update', $noticia->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('titulo', 'Título') !!}
            {!! Form::text('titulo', $noticia->titulo, ['class' => 'form-control', 'placeholder' => 'Digite o título']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('conteudo', 'Conteúdo') !!}
                {!! Form::textarea('conteudo', $noticia->conteudo, ['class' => 'form-control', 'placeholder' => 'Digite a notícia']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('categoria', 'Categoria') !!}
                {!! Form::text('categoria', $noticia->categoria, ['class' => 'form-control', 'placeholder' => 'Digite a categoria']) !!}
            </div>
            {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::submit('Salvar', ['class' => 'button']) !!}
    {!! Form::close() !!}

@endsection
