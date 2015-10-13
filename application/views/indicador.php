<div class="row">
    
<!--     <div class="col-xs-6 col-sm-4">-->
<div class="col-md-4">
         <center>SELECCIONAR SECTOR(ES)</center>
    <div class="panel panel-primary">
            <div class="panel-body">
                
                  <form id="form-sector" >
<!--                  <div style="overflow: auto; height:350px; width: 100%;">-->
                      <table class="table table-first-column-number data-table display full">  
                          <thead>
                              <tr>
                                  <th></th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                  <?php 
		foreach($query as $value)
		{
		?>
                          <tr>
                              <td>
                              <input type="checkbox" name="listaSector[]" value="<?php echo $value->idfuenteinformacion; ?>">
                              </td> 
                              <td>
                                  <?php echo $value->nombresector; ?>
                              </td>
                          </tr>
        
		<?php
		}
		?>  
                        </tbody>
                      </table>
<!--                  </div> <br>-->
 
                  <center>
                      
                      <button type="button" id="btnListar" class="btn btn-primary btn-lg btn-block">Mostrar Indicadores</button>
                  </center>
                  </form>
                    
            </div>
          </div>
  </div>
    
    
   
        
    
    <div class="col-md-8">
        
        
        
        
        <center>SELECCIONAR INDICADOR(ES)</center>
        <div class="panel panel-primary">  
            <div class="panel-body">
                
                <form method="post" action="<?php echo base_url()?>consulta/mostrar">
                  <div style="overflow: auto; height:338px; width: 100%;">
                      <!--class="table table-bordered"  -->
                      <div id="listaIndicadores">
    
                      </div>               
                  </div>
                  <br>
                  <center>
                       <input type="submit" value="Mostrar Localidad y Periodo" class="btn btn-primary">
                  </center>
                </form>
                
            </div>
        </div>
    
    </div>
    
 
    
</div>