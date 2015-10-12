

<script type="text/javascript">
    $(document).ready(function() {
        $("#sector").change(function() {
            $("#sector option:selected").each(function() {
					sector = $('#sector').val();
					$.post("http://localhost:8080/indicadores/consulta/llena_indicadores", {
						sector : sector
					}, function(data) {
						$("#localidad").html(data);
					});
				});
			})
       
                        
		});
</script>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Seleccione Sector</h3>
  </div>
  <div class="panel-body">
      <select name="sector" id="sector">
		<?php 
		foreach($query as $value)
		{
		?>
			<option value="<?php echo $value->sec_id; ?>"><?php echo $value->sec_name; ?></option>
		<?php
		}
		?>		
	</select>
      <select name="localidad" id="localidad">
    		<option value="">Selecciona tu Indicador</option>
    </select>
  </div>
</div>
<hr><br>



    <form class="form-inline" role="form" id="formulario_ajax" action="<?php echo base_url() ?>consulta/llenar_indi" method="POST">
    <div class="form-group">
         <?php 
		foreach($query as $value)
		{
		?>
        <input type="checkbox" name="listaSector[]" value="<?php echo $value->sec_id?>"><?php echo $value->sec_name?>
		<?php
		}
		?>           
    </div>
    <div class="form-group">
        <input type="submit" value="submit">
    </div>
</form>
<hr>
<br>

<form id="form-sector" action="<?php echo base_url()?>consulta/buscar_indicadores" method="post">
    <?php 
		foreach($query as $value)
		{
		?>
        <input type="checkbox" name="listaSector[]" value="<?php echo $value->sec_id?>"><?php echo $value->sec_name?>
		<?php
		}
		?>  
        <button type="button" id="btnListar">Listar indicadores</button>
</form>
<div id="listaIndicadores">
    
</div>