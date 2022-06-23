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
                        <a href="{{route("home")}}" class="btn btn-success btn-sm mb-2">Home</a>

                        </div>
                        <!--Tabla principal: listado de peliculas-->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Año</th>
                                <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody id='tblpeli'> 
                                @foreach($peliculas as $pelicula)
                                    <tr style="cursor: pointer;">
                                         

                                    <td class="align-middle">{{$pelicula->titulo}}</td>
                                    <td class="align-middle">{{$pelicula->anio}}</td>

                                    <td class="align-middle">
                                        <button type="submit" id="{{$pelicula->id}}" data-id={{$pelicula->id}} class="btn btn-success">
                                            <i>FAV</i>
                                        </button>
                                    </td>

                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
        </div>
        <!--Fin de la tabla listado de peliculas-->
        <!--inicio de la tabla favoritos de peliculas-->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ __('Favoritos') }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="">
                        <a href="{{route("home")}}" class="btn btn-success btn-sm mb-2">Home</a>
          
                        </div>
                        <!--Tabla favoritos-->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Año</th>
                                <th scope="col"></th>
          
                                </tr>
                            </thead>
                            <tbody id="tblfav">
                                @foreach($favoritos as $favorito)
                                <tr style="cursor: pointer;">
                                     

                                <td class="align-middle">{{$favorito->pelicula->titulo}}</td>
                                <td class="align-middle">{{$favorito->pelicula->anio}}</td>

                                <td class="align-middle">
                                    <button type="submit" data-id={{$pelicula->id}} class="btn">
                                        <i>Quitar</i>
                                    </button>
                                </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
          </div>
        <script>
                //Agregar a favoritos
                $(document).ready(function(){
                    $('body').on('click', '.btn.btn-success', function(){
                        //$("#{{$pelicula->id}}").prop('disabled', true);
                        var dato = $(this).attr('data-id');
                        //console.log(dato);
                        $.ajax({
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            url:'favorito/agregar',
                            method: 'POST',
                            dataType: 'json',
                            data:{id: dato},
                            success: function(response){
                                console.log(response);
                                
                                    $("#tblfav").append(
                                        "<tr>"  +
                                        "<td class='align-middle'>" + response.titulo + "</td>" +
                                        "<td class='align-middle'>" + response.anio +"</td>" +
                                        "<td class='align-middle'>" +
                                        "<button type='submit' class='btn'>" +
                                            "<i>"+'Quitar'+"</i>" +
                                        "</button>" +
                                        "</td>"+
                                        "</tr>"

                                    );
                              
                                
                            }

                        })
                        
                    });      
                });
            
            //quitar de favoritos
            $(document).ready(function(){
                    $('body').on('click', '.btn', function(){
                       
                        var dato = $(this).attr('data-id');
                        //console.log(dato);
                        $.ajax({
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            url:'favorito/quitar',
                            method: 'POST',
                            dataType: 'json',
                            data:{id: dato},
                            success: function(response){
                                console.log(response);
                                
                                    $("#tblfav").append(
                                        "<tr>"  +
                                        "<td class='align-middle'>" + response.titulo + "</td>" +
                                        "<td class='align-middle'>" + response.anio +"</td>" +
                                        "<td class='align-middle'>" +
                                        "<button type='submit' class='btn'>" +
                                            "<i>"+'Quitar'+"</i>" +
                                        "</button>" +
                                        "</td>"+
                                        "</tr>"

                                    );
                              
                                
                            }

                        })
                        
                    });      
                });
                
        </script>
     </div
    

 @endsection

