<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelicula extends Model
{
    use HasFactory;
    use SoftDeletes;
     
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
       return $this->belongsTo('App\Models\Actor');
    }
    public function Favorito(){
        return $this->hasOne('App\Models\Favorito', 'peliculaID');
     }
}
