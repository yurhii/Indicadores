<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">                
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url('public/img/favicon.ico')?>" rel="icon" type="image/x-icon" />
        <title>Reporte Indicadores</title>
    </head>
    <body style="margin-bottom: 0; padding: 0;">       
    <center>
        <img width="100%" src="<?php echo base_url()?>public/img/siar2015.jpg">
    </center>
        
        <div class="contenido" id="container">            
            <div class="col-md-12">
               	<?php
                
                    if($datostablaReg!='Error'){
                        if(count($datostablaReg)>0){
                            print_r($datostablaReg);
                        }else{
                            echo 'No existen datos...';
                        }
                    }else{
                        echo 'No existen datos...';
                    }
                ?>
            </div>                        
        </div>
            
        <footer>
            <center>
                <h4>                   
                    </h4> &copy; Indicadores - 2015
                </center>
        </footer>
    </body>       
</html>

