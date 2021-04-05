@extends('layouts.app')

@section('content')
    
    
    <div class="row">
        <div class="col-md-6">
            <h1>Noticias</h1>
        </div>
        <div class="col-md-6">
            <form action="{{ route('search') }}" method="GET" role="search">
                <div class="input-group align-right">
                    <input type="search" class="form-control" name="search" placeholder="Pesquisar noticias" id="search">
                    <span class="input-group-prepend">
                        <button class="btn btn-info" type="submit" title="Search noticias">Pesquisar</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    @if (count($noticias) >= 1)
        @foreach ($noticias as $noticia)
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/noticias/{{$noticia->id}}">
                        <h3>{{$noticia->titulo}}</h3>
                    </a>
                    <small> Escrito em {{$noticia->created_at}}</small>
                </li>
            </ul>
            {{-- {{$noticias->links()}} erro quando chamado pela busca --}}
        @endforeach
    @else
        <p>Ainda não há notícias cadastradas.</p>
    @endif
@endsection

