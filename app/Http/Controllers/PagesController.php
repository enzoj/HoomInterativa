<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function createUser()
    {
        return view('noticias');
    }

    public function visualizar()
    {
        $noticia = 'titulo';
        return view('visualizar')->with('noticia', $noticia);
    }
}
