$(document).ready(function() {
    $( "#search" ).autocomplete({
  
        source: function(request, response) {
            $.ajax({
            url: siteUrl + '/' +"autocomplete",
            data: {
                    term : request.term
             },
            method: 'POST',
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.name;
               }); 
  
               response(resp);
            }
        });
    },
    minLength: 2
 });
});
/*
$(document).ready(function(){
    var pelis = ['peli1', 'terremoto', 'tiburon', 'huracan'];

    $('#search').autocomplete({
        source: pelis
    });

});*/