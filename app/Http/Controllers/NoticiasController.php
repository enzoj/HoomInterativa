<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\User;

class NoticiasController extends Controller
{
    /**
     * Create a new controller instance.
     * Impede que os métodos sejam acessados sem um usuário logado
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // It's callde by default /noticias since this is the index
        $noticias = Noticia::orderBy('created_at', 'desc')->paginate(10);
        return view('noticias')->with('noticias', $noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'conteudo' => 'required',
            'categoria' => 'required'
        ]);
        
        $noticia = new Noticia;
        $noticia->titulo = $request->input('titulo');
        $noticia->conteudo = $request->input('conteudo');
        $noticia->categoria = $request->input('categoria');
        $noticia->user_id = auth()->user()->id;
        $noticia->save();

        return redirect('/noticias')->with('success', 'Notícia criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);
        $user = User::find($noticia->user_id);
        return view('visualizar')->with('noticia', $noticia)->with('name', $user->name);
        // return "show function in noticias controller";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);
        $user = User::find($noticia->user_id);
        return view('editar')->with('noticia', $noticia)->with('name', $user->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'conteudo' => 'required',
            'categoria' => 'required'
        ]);
        
        $noticia = Noticia::find($id);
        $noticia->titulo = $request->input('titulo');
        $noticia->conteudo = $request->input('conteudo');
        $noticia->categoria = $request->input('categoria');
        $noticia->user_id = auth()->user()->id;
        $noticia->save();

        return redirect('/noticias')->with('success', 'Notícia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        $noticia->delete();
        return redirect('/noticias')->with('success', 'Notícia apagada com sucesso!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $noticias = Noticia::where('titulo', 'like', '%'.$search.'%')
            ->orWhere('categoria', 'like', '%'.$search.'%')
            ->get()
            ->paginate(10);
        // $noticias = Noticia::where('titulo', 'like', '%'.$search.'%');
        // $noticias = Noticia::where([
        //     ['titulo', 'like', '%'.$search.'%'],
        //     ['categoria', 'like', '%'.$search.'%']
        //     ])->paginate(10);
        // return $noticias;
        return view('noticias')->with('noticias', $noticias);
    }
}
