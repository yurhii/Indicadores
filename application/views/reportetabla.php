<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">                
	<meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <title>Reporte Indicadores</title>
    </head>

    <body style="margin-bottom: 0; padding: 0;">   
    
    <center>
        <img width="100%" src="<?php echo base_url()?>public/img/siar2015.jpg">
    </center>
        
        <div class="contenido" id="container">            
            <div class="col-md-12">
               	<?php
                    if(count($dataTable)>0){
                        
                ?>       
                <table border='1'>
                    <thead>
                        <tr>
                            <th></th>
                            <th><?php echo $this->session->userdata('provincia').'/'.$this->session->userdata('distrito');?></th>                            
                        </tr>        
                        <tr>
                            <th></th>
                            <?php 
                            foreach ($dataTable as $value) {
                                echo '<th>'.$value['t_sector'].'</th>';
                            }                         
                            ?>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <?php 
                            foreach ($dataTable as $value) {
                                echo '<th>'.$value['t_indicador'].'</th>';
                            }                            
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dataTable as $value) {
                            echo '<tr><td>'.$value['t_periodo'].'</tr></td>';
                        }
                        ?>
                    </tbody>
                </table>
                <?php
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


