@extends('layouts.plantilla')

@section('contenido')
<div class="form-group text-center ">                                            
    <img id="foto_view" class="rounded mx-auto d-block" height="300" src="{{ asset('storage/lignum.png') }}" alt="">
</div>


<div class="form-group">
    <a class="btn btn-primary" href="{{route("pelicula.index")}}">Peliculas</a>
    <a class="btn btn-primary" href="{{route("actor.index")}}">Actores</a>
    <a class="btn btn-primary" href="{{route("favorito.index")}}">Favoritos</a>

</div>
@endsection