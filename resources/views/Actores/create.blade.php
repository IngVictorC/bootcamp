@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('Nuevo Actor') }}</strong>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route("actor.store")}}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-7">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{old('nombre')}}"autofocus>
                                @error('nombre')
                                <span >
                                    <small>*{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fechaNac" class="col-md-3 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>
                            <div class="col-md-4">
                                <input id="fechaNac" type="date" class="form-control" value="{{old('fechaNac')}}"name="fechaNac">
                                @error('fechaNac')
                                <span >
                                    <small>*{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br/><br/>
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Guardar') }}
                                </button>
                                <a class="btn btn-primary" href="{{route("actor.index")}}">Volver listado</a>
                            </div>							
                        </div>						
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
