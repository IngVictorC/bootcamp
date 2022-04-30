<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actores';
    protected $fillable = [
      'nombre',
      'fechaNac'
    ];
     // Uno a muchos
     public function pelicula(){
        return $this->hasMany('App\Models\Pelicula');
     }
}
