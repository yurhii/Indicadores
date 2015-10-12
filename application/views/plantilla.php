<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">                
	<meta name="viewport" content="width=device-width, initial-scale=1.0">        
	<link href="<?php echo base_url('public/css/micss.css') ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet" media="screen">
        <script src="<?php echo base_url('public/js/bootstrap.js') ?>"></script>
        <script src="<?php //echo base_url('public/js/jquery-2.1.1.min.js') ?>"></script>
        
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        
        <script type="text/javascript">
		$(document).ready(function(){
			$("#formulario_ajax").submit(function(){
				$.ajax({
					url: $(this).attr("action"),
					type: $(this).attr("method"),
					data: $(this).serialize(),
					beforeSend:function(){
						$(".loader").show();
					},
                    success:function(){
                        $(".loader").fadeOut("slow");
                    }
				});
 
			});
			return false;
		});
		</script>

            
    </head>

    <body style="margin-bottom: 0; padding: 0;">   
    
    <center>
        <img width="100%" src="<?php echo base_url()?>public/img/siar2015.jpg">
            </center>
    
        <nav class="navbar navbar-default">
            <div class="container">
              <div class="navbar-header">
                <ul class="nav nav-pills"> <!--<ul class="nav navbar-nav">-->
                    <li>                       
                        <a href="#">
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Consulta
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Indicadores
                        </a>
                    </li>
                  </ul>
              </div>
            </div>
          </nav>    
                <!-- Contenido de la aplicación -->
        <div class="contenido" id="container">
            
            <div class="col-md-12">
               	<?php $this->load->view($contenido) ?>
            </div>            
            
        </div>
            
        <footer>
            <center>
                <p><h4>
                    <?php //echo $this->session->userdata('usuario').' ('.$this->session->userdata('nombre_per').')'; ?> 
                    </h4> &copy; Indicadores - 2015
                    <br>
                </p>                
                </center>
        </footer>            
        
	<script src="<?php echo base_url();?>public/js/jquery-1.11.3.min.js"></script>
	<script src="<?php echo base_url('public/js/indicadores.js') ?>"></script>	
    </body>
        
        
</html>
