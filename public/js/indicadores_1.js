$(document).on("ready", inicio);
function inicio(){
    $("#btnListar").click(listar_indicadores);
    
}
function listar_indicadores(){
    $.ajax({
       url:"http://localhost:8080/indicadores/consulta/buscar_indicadores",
        type: 'POST',
        data: $("#form-sector").serialize(),
        success:function(respuesta){
            //alert(respuesta);
            var registros = eval(respuesta);	
                html ="<table class='table table-responsive table-bordered'><thead>";
                html +="<tr><th>ID</th><th>NAME</th></tr>";
                html +="</thead><tbody>";
                for (var i = 0; i < registros.length; i++) {
                    html +="<tr><td>"+registros[i]["ind_id"]+"</td><td>"+registros[i]["ind_name"]+"</td></tr>";
                };
                html +="</tbody></table>";
                $("#listaIndicadores").html(html);
        }
    });
}