<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidarFormRequest;
use Intervention\Image\Facades\Image;
use App\Models\Pelicula;
use App\Models\Actor;
use Illuminate\Http\Request;


class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas=Pelicula::all()->sortby('codigo');
        return view('Peliculas.index')->with('peliculas', $peliculas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actoresID = Actor::all();
        return view('Peliculas.create', compact('actoresID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|numeric|',
            'anio' => 'required|numeric|regex:/^[0-9]+$/',
            'titulo' => 'required|max:255',
            'duracion' => 'required|numeric|regex:/^[0-9]+$/',
            'sinopsis' => 'required|max:255',
            'imagen' => 'nullable|file|image|max:8192',
        ]);

        $peliculas = new Pelicula();
        
        //dd($request->hasFile('imagen'));

        $peliculas->codigo = $request->codigo;
        $peliculas->anio = $request->anio;
        $peliculas->titulo = $request->titulo;
        $peliculas->duracion = $request->duracion;
        $peliculas->sinopsis = $request->sinopsis;
        //imagen

        $image_resize = Image::make($request->file('imagen')->getRealPath());
        $image_resize->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        $image_resize->orientate();
        $nombre_archivo = $peliculas->titulo . '.jpg';
        $image_resize->save(storage_path('app/pelicula/' . $nombre_archivo), 90, 'jpg');

        $peliculas->imagen = $nombre_archivo;


        //$peliculas->imagen = 'archi.jpg';
         
        $peliculas->actorID = $request->actorID; 
        $peliculas->save();

        return redirect('/pelicula');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);
        $actoresID = Actor::all();
             
        
        return view('Peliculas.edit', compact('actoresID'))->with('pelicula',$pelicula);

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
        $pelicula = Pelicula::find($id);
        $pelicula->codigo = $request->codigo;
        $pelicula->anio = $request->anio;
        $pelicula->titulo = $request->titulo;
        $pelicula->duracion = $request->duracion;
        $pelicula->sinopsis = $request->sinopsis;
        
        //imagen

        $image_resize = Image::make($request->file('imagen')->getRealPath());
        $image_resize->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        $image_resize->orientate();
        $nombre_archivo = $pelicula->titulo . '.jpg';
        $image_resize->save(storage_path('app/pelicula/' . $nombre_archivo), 90, 'jpg');

        $pelicula->imagen = $nombre_archivo;


        $pelicula->actorID = $request->actorID;    
        $pelicula->save();

        return redirect('/pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->delete();

        return redirect('/pelicula');
    }
}
