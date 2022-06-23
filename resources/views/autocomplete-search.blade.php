<!DOCTYPE html>
<html>
<head>
    <title>Buscador</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</head>
<body>
 
<div class="container mt-4">
 
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      <h2>Buscador de Peliculas</h2>
    </div>
 
    <div class="card-body">
      <form name="autocomplete-textbox" id="autocomplete-textbox" method="post" action="#">
       @csrf
 
        <div class="form-group">
          <label for="exampleInputEmail1">Titulo de la pelicula:</label>
          <input type="text" id="search" name="titulo" class="form-control">
        </div>
 
      </form>
    </div>
  </div>
   
</div>  
  <script>
    $(document).ready(function() {
    $( "#search" ).autocomplete({
  
        source: function(request, response) {
            $.ajax({
            //url: siteUrl + '/' +"autocomplete",
            url: "{{route('autocomplete')}}",
            data: {
                    term : request.term
             },
            
            dataType: "json",
            success: function(data){
               
  
               response(data);
            }
        });
    },
    minLength: 2
 });
});
  </script>
</body>
 
</html>