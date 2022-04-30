@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('Actores') }}</strong>
                </div>
                <div class="card-body">
                    <div class="">    
                        <a  href="{{route("home")}}" class="btn btn-success btn-sm mb-2">Home</a>
                        <a href="{{route("actor.create")}}" class="btn btn-success btn-sm mb-2">Agregar</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actores as $actor)
                            <tr>
                                <th class="align-middle" scope="row">{{$loop->index+1}}</th>
                                <td class="align-middle">{{$actor->nombre}}</td>
                                <td class="align-middle">{{$actor->fechaNac}}</td>
                                
                                <td class="align-middle">
                                    <a class="btn btn-warning btn-sm" href="{{route("actor.edit",[$actor])}}">
                                        <i class="fa fa-edit">Editar</i>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <form action="{{route("actor.destroy", [$actor])}}" method="post">
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
</div>
@endsection