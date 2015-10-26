$(document).on("ready", inicio);
function inicio(){
    $("#btnListar").click(listar_indicadores);   
    $("#btnTabla").click(datosTabla);   
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
                html +="<tr><th></th><th>Indicador</th><th>Sector</th><th>Periodo</th></tr>";
                html +="</thead><tbody>";
                for (var i = 0; i < registros.length; i++) {
                    html +="<tr><td><input type='checkbox' name='listaIndicador[]' value='"+registros[i]["idformindicador"]+registros[i]["valor"]+registros[i]["periodo"]+"'></td><td>"+registros[i]["nombreindicador"]+"</td><td>"+registros[i]["abrsector"]+"</td><td>"+registros[i]["periodo"]+"</td></tr>";
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

function datosTabla(){
    $.ajax({
       url:"http://localhost:8080/indicadores/indicador/reportetabla",
        type: 'POST',
        data: $("#form-indicador").serialize(),
        success:function(respuesta){
        //alert(respuesta);        
            var registros = eval(respuesta);
            //alert(registros);
            if(registros === undefined){
                html = "<table>No existen datos...</table>";
                $("#reportetabla").html(html);                
            }else{
                
                html ="<table border='1'><thead>";
                html +="<tr><th></th><th>Apurimac</th></tr>";
                html +="<tr><th></th><th>DREA</th></tr>";
                html +="<tr><th>Fecha</th><th>Casos familiar</th></tr>";
                html +="</thead><tbody>";
                for (var i = 0; i < registros.length; i++) {
                    html +="<tr><td>"+registros[i]["t_periodo"]+"</td><td>"+registros[i]["t_valor"]+"</td></tr>";
                };
                html +="</tbody></table>";                
                $("#reportetabla").html(html);
            }
        }
    });
}
