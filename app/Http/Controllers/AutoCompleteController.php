<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelicula;

class AutoCompleteController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('autocomplete-search');
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $term = $request->get('term');
        $consultas = Pelicula::where('titulo','LIKE','%' . $request->term . '%' )->get();
        $data=[];
        foreach ($consultas as $consulta){
            $data[]= [
                'label' => $consulta->titulo
            ];
        }
    
        return $data;
    }
}
