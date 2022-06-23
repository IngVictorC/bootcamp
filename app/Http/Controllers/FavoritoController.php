<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $peliculas = Pelicula::all();
        $favoritos = Favorito::all();
        
        return view('Favoritos.index')->with ('peliculas',$peliculas)
                                      ->with ('favoritos',$favoritos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agregar(Request $request){
       
        if($request->ajax()){
            
            $favoritos = new Favorito();
            $peliculaID = $favoritos->peliculaID = $request->id;
            $favoritos->save();
            
            $pelicula = Pelicula::find($peliculaID);

            return response()->json($pelicula->toArray());

        }
       /*
        $favoritos = new Favorito();
        $favoritos->peliculaID = $id;
        
        $favoritos->save();
        return response($favoritos);*/
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $favoritos = new Favorito();
        $favoritos->peliculaID = $request->id;
        
        $favoritos->save();

        return response()->json ($favoritos)->with('favoritos',$favoritos); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
