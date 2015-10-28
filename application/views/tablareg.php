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
                ?>
                
                <table border="1">
                    <tr>
                        <td></td>
                        <?php $cantidad = count($datostablaReg); ?>
                        <td colspan="<?php echo $cantidad;?>">APURÍMAC</td>                        
                    </tr>
                    <tr>       
                        <td></td>
                        <?php        
                            $cantIndi = count($this->session->userdata('listnombre'));
                            $indisec = $this->session->userdata('indisec');
                            foreach ($datosiglaSec as $value){
                                
                                echo '<td colspan="'.$cantIndi.'">'.$value->sigla.'</td>';
                            }
//                            print_r($indi);
//                            echo '<br>';
//                            print_r($sec);
                        ?>
                    </tr>  
                    <tr>
                        <td>Fecha</td>
                        <?php
                        $nombresindi = $this->session->userdata('listnombre');
                        foreach ($nombresindi as $value){
                            echo '<td>'.$value.'</td>';
                        }
                        ?>
                    </tr>
                </table>                
                
                <?php
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


