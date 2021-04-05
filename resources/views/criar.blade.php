@extends('layouts.app')

@section('content')
    <h1>Criar Notícia</h1>

    {!! Form::open(['action' => 'NoticiasController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('titulo', 'Título') !!}
            {!! Form::text('titulo', '', ['class' => 'form-control', 'placeholder' => 'Digite o título']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('conteudo', 'Conteúdo') !!}
                {!! Form::textarea('conteudo', '', ['class' => 'form-control', 'placeholder' => 'Digite a notícia']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('categoria', 'Categoria') !!}
                {!! Form::text('categoria', '', ['class' => 'form-control', 'placeholder' => 'Digite a categoria']) !!}
            </div>
            {!! Form::submit('Salvar', ['class' => 'button']) !!}
    {!! Form::close() !!}

@endsection
