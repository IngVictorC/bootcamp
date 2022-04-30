@extends('layouts.plantilla');

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('Editar Pelicula') }}</strong>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route("pelicula.update", [$pelicula])}}" enctype="multipart/form-data">
                       
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="codigo" class="col-md-3 col-form-label text-md-right">{{ __('Codigo') }}</label>
                        <div class="col-md-7">
                            <input id="codigo" name= 'codigo' type="text" class="form-control" value = {{$pelicula->codigo}}>
                        </div>

                        </div>	

                        <div class="form-group row">
                            <label for="titulo" class="col-md-3 col-form-label text-md-right">{{ __('Titulo') }}</label>
                        <div class="col-md-7">
                            <input id="titulo" name= 'titulo' type="text" class="form-control" value = {{$pelicula->titulo}}>
                        </div>    
                            
                        </div>

                        <div class="form-group row">
                            <label for="anio" class="col-md-3 col-form-label text-md-right">{{ __('Año') }}</label>
                        <div class="col-md-7">
                            <input id="anio" name= 'anio' type="text" class="form-control" value = {{$pelicula->anio}}>
                        </div>    
                            
                        </div>
                        
                                                                       
                        <div class="form-group row">
                            <label for="duracion" class="col-md-3 col-form-label text-md-right">{{ __('Duración (min.)') }}</label>
                        <div class="col-md-7">
                            <input id="duracion" name= 'duracion' type="text" class="form-control" value = {{$pelicula->duracion}}>
                        </div>
                           
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="sinopsis" class="col-md-3 col-form-label text-md-right">{{ __('Sinopsis') }}</label>
                        <div class="col-md-7">
                            <textarea id="sinopsis" name= 'sinopsis' class="form-control"> {{$pelicula->sinopsis}} </textarea>                        
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="actorID" class="col-md-3 col-form-label text-md-right">{{ __('Actor Principal') }}</label>
                        <div class="form-group col-md-7">
                        <select name="actorID" id="actorID" class=" form-control custom-select">
                            @foreach ($actoresID as $actorID)
                                <option value="{{$actorID ['id']}}">
                                    {{$actorID ['nombre']}}
                                </option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-row"> 
                        <div class="form-group  ">
                            <div class="form-row col-md-7 ">                                            
                                <img id="foto_view" class="rounded mx-auto d-block" height="100" src="{{ asset('storage/user_default.png') }}" alt="">
                            </div>

                            <div class="form-group">
                                <input name="imagen" id="imagen" type="file" class="form-control custom-file-input " onchange="loadFile(event)">    
                                <label  for="imagen" >Seleccione un archivo</label>                                                                                                                      
                            </div>
                        </div>
                    </div>

                         <br><br/>   
                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Guardar') }}
                                </button>
                                <a class="btn btn-primary" href="{{route("pelicula.index")}}">Volver al listado</a>
                            </div>							
                        </div>						
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // MOSTRAR LA IMAGEN SELECCIONADA
    var loadFile = function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('foto_view');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    // MOSTRAR EL  NOMBRE DEL ARCHIVO EN LOS FILE INPUT
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

@endsection