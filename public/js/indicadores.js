$(document).on("ready", inicio);
function inicio(){
    
    $("#btnIndiReg").click(listarIndiReg);
    $("#btnIndiPro").click(listarIndiPro);
    $("#btnIndiDis").click(listarIndiDis);
}

function listarIndiReg(){
    $.ajax({
       url:"http://localhost:8080/indicadores/indicador/buscarindireg",
        type: 'POST',
        data: $("#form-sector").serialize(),
        success:function(respuesta){
        //alert(respuesta);        
            var registros = eval(respuesta);
            //alert(registros[0]['sigla']);
            
            if(registros != ''){
                
                html ="<table class='table table-hover'>";                   
                html +="<tbody>";
                for (var i = 0; i < registros.length; i++) {
                    html +="<tr><td><input type='checkbox' name='listaIndicador[]' value='"+registros[i]["idformula"]+","+registros[i]["nombreindicador"]+","+registros[i]["abrsector"]+","+registros[i]["idfuenteinformacion"]+","+registros[i]["sigla"]+"'></td><td>"+registros[i]["nombreindicador"]+"</td><td>"+registros[i]["abrsector"]+"</td></tr>";
                };
                html +="</tbody></table>";                
                $("#listaIndiReg").html(html);
            }else{
                //alert(respuesta);
                html = "<table>No existe Indicadores</table>";
                $("#listaIndiReg").html(html);
            }
        }
    });
}
function listarIndiPro(){
    
}
function listarIndiDis(){
    
}

