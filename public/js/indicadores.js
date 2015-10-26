$(document).on("ready", inicio);
function inicio(){
    $("#btnListar").click(listar_indicadores);   
}


function listar_indicadores(){
    $.ajax({
       url:"http://localhost:8080/indicadores/indicador/buscar_indicadores",
        type: 'POST',
        data: $("#form-sector").serialize(),
        success:function(respuesta){
        //alert(respuesta);        
            var registros = eval(respuesta);
            
            if(registros != ''){
                html ="<table class='table table-hover'><thead>";
                html +="<tr><th></th><th>Indicador</th><th>Sector</th></tr>";
                html +="</thead><tbody>";
                for (var i = 0; i < registros.length; i++) {
                    html +="<tr><td><input type='checkbox' name='listaIndicador[]' value='"+registros[i]["idelemento"]+"'></td><td>"+registros[i]["nombre"]+"</td><td>"+registros[i]["sigla"]+"</td></tr>";
                };
                html +="</tbody></table>";                
                $("#listaIndicadores").html(html);
            }else{
                //alert(respuesta);
                html = "<table>No existe Indicadores</table>";
                $("#listaIndicadores").html(html);
            }
        }
    });
}