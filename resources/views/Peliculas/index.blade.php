@extends('layouts.plantilla');

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('Peliculas') }}</strong>
                </div>
                <div class="card-body">
                    <div class="">    
                        <a  href="{{route("home")}}" class="btn btn-success btn-sm mb-2">Home</a>
                        <a  href="{{route("pelicula.create")}}" class="btn btn-success btn-sm mb-2">Agregar</a>
                       
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Año</th>
                                <th scope="col">Duracion</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peliculas as $pelicula)
                            <tr style="cursor: pointer;">
                                
                                <td class="align-middle">{{$pelicula->codigo}}</td>
                                <td class="align-middle">{{$pelicula->titulo}}</td>
                                <td class="align-middle">{{$pelicula->anio}}</td>
                                <td class="align-middle">{{$pelicula->duracion}}</td>
                                <td class="align-middle">
                                    <a  href="{{route("pelicula.edit",[$pelicula])}}" class="btn btn-warning btn-sm" >
                                        <i class="fa fa-edit">Editar</i>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <form action="{{route("pelicula.destroy", [$pelicula])}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash">Eliminar</i>
                                        </button>
                                    </form>
                                </td> 
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>				
            </div>
        </div>
    </div>
</div
@endsection