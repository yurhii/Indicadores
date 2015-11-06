<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">                
	<meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link href="<?php echo base_url('public/img/favicon.ico')?>" rel="icon" type="image/x-icon" />
        <title>Indicadores 2015</title>
	<link href="<?php echo base_url('public/css/micss.css') ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet" media="screen">        
        
        <script src="<?php echo base_url('public/js/bootstrap.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/jquery.js') ?>"></script>
        <script src="<?php echo base_url('public/js/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('public/js/jquery.dataTables.bootstrap.js')?>"></script>

                

<script type="text/javascript">
    
    $(function(){
       $('table.data-table.full').dataTable( {
            "iDisplayLength": 50,
            "aLengthMenu": false,//[5, 6, 10],
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "sPaginationType": "full_numbers",
            "sDom": '<""f>t<"F"lp>',
            "sPaginationType": "bootstrap"
        });
    });
</script>	
        
    </head>

    <body style="margin-bottom: 0; padding: 0;">   
    
    <center>
        <img width="100%" src="<?php echo base_url()?>public/img/siar2015.jpg">
            </center>
    
    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
<!--              <div class="navbar-header">-->
                <ul class="nav nav-pills">
                <!--<ul class="nav navbar-nav"> <ul class="nav navbar-nav">-->
                    <li>                       
                        <a href="<?php echo base_url('indicador')?>">
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('indicador/indiregional')?>">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Regional
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('indicador/indiprovincial')?>" >
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Provincial
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('indicador/indidistrital')?>" >
                            <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Distrital
                        </a>
                    </li>
                  </ul>
              </div>
            <!--</div>-->
          </nav>    
                <!-- Contenido de la aplicación -->
        <div class="contenido" id="container">
            
            <div class="col-md-12">
               	<?php $this->load->view($contenido) ?>
            </div>            
            
        </div>
        <footer>
            <center>
                <h4>                   
                    </h4> &copy; Indicadores - 2015
            </center>
        </footer>     
	<script src="<?php echo base_url();?>public/js/jquery-1.11.3.js"></script>
	<script src="<?php echo base_url('public/js/indicadores.js') ?>"></script>	        
    </body>
</html>
