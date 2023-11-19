<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use Illuminate\Support\Facades\Cache;
class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        

        //criar um dado dentro do bd Redis
        //Cache::put('site','davigledson@outlook.com',10);
        //chave, valor, tempo em segundos para expirar o dado e memoria 
        //recuperar um dado dentro do bd redis
        //$site = Cache::get('site');
        //echo $site;
        $noticias = [];
       
        //verificar se existe um determinado valor
        if (Cache::has('dez_primeiras_noticias')){
            $noticias = Cache::get('dez_primeiras_noticias');
        } else {
            
    $noticias = Noticia::orderByDesc('created_at')->limit(10)->get();
    Cache::put('dez_primeiras_noticias',$noticias,15);
        }
        
        
        
        return view('noticia',['noticias'=> $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}
