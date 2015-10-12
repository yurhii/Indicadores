<div class="row">
    <div class="col-md-9 col-md-push-3">
        <div class="panel panel-primary">  
            <div class="panel-body">
                <center>SELECCIONAR INDICADOR(ES)</center>
                <form method="post" action="<?php echo base_url()?>consulta/mostrar">
                  <div style="overflow: auto; height:350px; width: 100%;">
                      <!--class="table table-bordered"  -->
                      <div id="listaIndicadores">
    
                        </div>               
                  </div> 
                  <br>
                  <center>
                       <input type="submit" value="Mostrar Localidad y Periodo" class="btn btn-primary">
                  </center>
                </form>
                <!--Inicio de localidad y periodo-->
                
                <form>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <center>SELECCIONAR LOCALIDAD(ES)</center>
                            <div style="overflow: auto; height:200px; width: 100%;">
                                
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <center>SELECCIONAR PERIODO</center>
                            <div style="overflow: auto; height:200px; width: 100%;">
                                
                            </div>
                        </div>
                    </div>
                    
                  
                    
                    <br>
                  <center>
                       <input type="submit" value="Consultar" class="btn btn-primary">
                  </center>
                  </form>
                <!--FIN de localidad y periodo-->
            </div>
        </div>
    </div>
  <div class="col-md-3 col-md-pull-9">
    <div class="panel panel-primary">
            <div class="panel-body">
                <center>SELECCIONAR SECTOR(ES)</center>
                  <form id="form-sector" action="<?php echo base_url()?>indicador/buscar_indicadores" method="post">
                  <div style="overflow: auto; height:300px; width: 100%;">
                      <table class="table table-bordered">  
                  <?php 
		foreach($query as $value)
		{
		?>
                          <tr>
                              <td>
                              <input type="checkbox" name="listaSector[]" value="<?php echo $value->idfuenteinformacion; ?>"><?php echo $value->nombresector; ?>
                              </td>                            
                          </tr>
        
		<?php
		}
		?>  

                      </table>
                  </div> <br>
                  <center>
                      
                      <button type="button" id="btnListar" class="btn btn-primary">Mostrar Indicadores</button>
                  </center>
                  </form>
            </div>
          </div>
  </div>
</div>






<!--
<form id="form-sector" action="<?php echo base_url()?>indicador/buscar_indicadores" method="post">
            <?php 
		//foreach($query as $value)
		//{
		?>
        <input type="checkbox" name="listaSector[]" value="<?php// echo $value->idfuenteinformacion; ?>"><?php// echo $value->nombresector; ?>
		<?php
	//	}
		?>  
        <button type="button" id="btnListar">Listar indicadores</button>
</form>
<div id="listaIndicadores">
    
</div>
-->