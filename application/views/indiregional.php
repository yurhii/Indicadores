
<div class="row">
    
<div class="col-md-5">
    <center><b>SELECCIONAR SECTOR(ES)</b></center>
    <div class="panel panel-primary">
            <div class="panel-body">
                <form id="form-sector"> <!--INICIO PAR CARGAR INDICADORES-->
                    <input type="hidden" name="txtLocalidad" value="Regional">
                  <div style="overflow: auto; height:310px; width: 100%; ">
                      <table class="table table-first-column-number data-table display full">  
                          <thead>
                              <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                  <?php 
		foreach($listaSecReg as $value)
		{
		?>
                          <tr>
                              <td>
                                  
                              <input type="checkbox" name="listaSector[]" value="<?php echo $value->idfuenteinformacion; ?>">
                              </td> 
                              <td>
                                  <?php echo $value->nombresector; ?>
                              </td>
                              <td hidden="">
                                  <?php echo $value->siglasector; ?>
                              </td>
                          </tr>
        
		<?php
		}
		?>  
                        </tbody>
                      </table>
                  </div>
 
                    
                    <br>
                    <center>
                        <button type="button" id="btnIndiReg" class="btn btn-primary">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            Mostrar Indicadores
                        </button>
                    </center>
                  </form> <!--fin form para cargar indicadores-->
                    
            </div>
    </div>
</div>

    <div class="col-md-7">

        <center><b>SELECCIONAR INDICADOR(ES)</b></center>
        <div class="panel panel-primary" style="border: 1.5px solid; border-color: #337ab7;">  
            <div class="panel-body">
<!--                <form id="form-indicador">-->
                <form method="post" action="" target="_blank">
                    <b><input type="checkbox" name="checktodo">Seleccionar Todo</b>
                    <input type="hidden" name="txtLocalidad" value="Regional">
                  <div style="overflow: auto; height:300px; width: 100%; border: 1px solid; border-color: #337ab7; margin-bottom: 5px;">
                      <!--class="table table-bordered"  -->
                    
                        <div id="listaIndiReg">
                                
                        </div>                            
                  </div>
                  <center>                    
                    <div class="btn-block"   role="group" aria-label="...">
                        <button type="submit" class="btn btn-primary" dir="<?php echo base_url('indicador/tablaindireg')?>"><span class=" glyphicon glyphicon-search"  ></span>Consultar</button>
                        <button type="submit" class="btn btn-info" dir="<?php echo base_url('indicador/exportExcel')?>"><span class=" glyphicon glyphicon-download"  ></span>Generar Excel</button>
                    </div>
                  </center>
                </form>
            
            </div>
        </div>
    
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
    $("button[type=submit]").click(function() {
        var accion = $(this).attr('dir');
        $('form').attr('action', accion);
        $('form').submit();
    });    
});
</script>
<script>
	$(document).ready(function(){
		$("input[name=checktodo]").change(function(){
		$('input[class=checkindica]').each(function(){
			if ($("input[name=checktodo]:checked").length == 1 ) {
				this.checked=true;
			}else{
				this.checked=false;
			}

		});		
	});
});
</script>

