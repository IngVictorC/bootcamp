<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;
    protected $table = 'favoritos';
    protected $fillable = ['peliculaID'];

    public function Pelicula(){
        return $this->belongsTo('App\Models\Pelicula', 'peliculaID');
    }
}
