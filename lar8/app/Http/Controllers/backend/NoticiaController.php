<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\NewsRequest;

class NoticiaController extends Controller
{

    public function index()
    {
        $newss = News::latest()->get();

        return view('news.index', compact('newss'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(NewsRequest $request)
    {
        //
        News::create([
            'titulo' =>             $request->titulo,
            'descripcion_rapida' => $request->descripcion_rapida,
            'descripcion' =>        $request->descripcion,
            'iframe' =>             $request->iframe,
            'autor' =>              $request->autor,
            'prioridad' =>          $request->prioridad,
            'objetivo' =>           $request->objetivo
         ]);

        return back()->with('status', 'Creado con éxito');
    }

    public function show(News $news)
    {
        //
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
        //dd($request->all());

        $news->update($request->all());

        return back()->with('status', 'Actualizado con éxito');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return back()->with('status', 'Eliminado con éxito');
    }

    public function noticias()
    {
        return view('newss', ['newss' => News::latest()->paginate(5)]);
    }

    public function home()
    {

        $data = [
            "newss" => News::latest()->take(1)->get(),
            "newss2" => News::latest()->skip(1)->take(3)->get(),
            "modal" => News::latest()->take(4)->get()
        ]; 

        return view('home', $data);
    }
}
