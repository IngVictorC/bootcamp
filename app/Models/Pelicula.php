<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    
     
   protected $table = 'peliculas'; 
    protected $fillable = [
        'codigo',
        'anio',
        'titulo',
        'duracion',
        'sinopsis',
        'imagen',
        'actorID'
    ];
    //Uno a uno
    
    public function Actor(){
       return $this->hasOne('App\Models\Actor');
    }
}
