<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory;
    use SoftDeletes;
    
     // Uno a muchos
     public function pelicula(){
        return $this->hasMany('App\Models\Pelicula');
     }
}
