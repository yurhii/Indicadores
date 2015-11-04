<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">                
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url('public/img/favicon.ico')?>" rel="icon" type="image/x-icon" />
        <title>Reporte Indicadores Regional</title>
        
        <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet" media="screen">        
        <script src="<?php echo base_url('public/js/bootstrap.js') ?>"></script>
        
    </head>
    <body style="margin-bottom: 0; padding: 0;">       
    <center>
        <img width="100%" src="<?php echo base_url()?>public/img/siar2015.jpg">
    </center>
    <br>
    <br>
        
        <div class="contenido" id="container">            
            <div class="col-md-12">
               	<?php                
                    if($datostablaReg!='Error'){
                        if(count($datostablaReg)>0){
                ?>
                
                
                <table class="table table-bordered">
                    <?php $anios = array("2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015");?>
                    <thead style="background-color: #dbdbdb">
                    <th>Sector</th>
                    <th>Indicador</th>
                    <th>Símbolo</th>
                        <?php
                            foreach ($anios as $value) {
                                echo '<th>'.$value.'</th>';
                            }
                        ?>
                    </thead>
                    <tbody>
                        
                    <?php    
                    $indisec = $this->session->userdata('indisec');
                    
                          foreach ($datostablaReg as $valued) {                              
                              foreach ($valued as $value) {
                              ?>
                    <tr>
                        
                        <?php 
                        
                        for ($i = 0; $i < count($indisec); $i++) {
                            $unionindisec = $indisec[$i][0].' '.$indisec[$i][1];
                            if($unionindisec==$value->nombre){
                                echo '<td>'.$indisec[$i][1].'</td>';
                                //echo '<td>'.$indisec[$i][0].' <span class="label label-primary"> '.$indisec[$i][2].' </span></td>';
                                echo '<td>'.$indisec[$i][0].'</td>'; 
                                echo '<td><span class="label label-primary"> '.$indisec[$i][2].' </span></td>';
                            }                        
                        } ?>
                        
                        <td><?php echo $value->a2005; ?></td>
                        <td><?php echo $value->a2006; ?></td>
                        <td><?php echo $value->a2007; ?></td>
                        <td><?php echo $value->a2008; ?></td>
                        <td><?php echo $value->a2009; ?></td>
                        <td><?php echo $value->a2010; ?></td>
                        <td><?php echo $value->a2011; ?></td>
                        <td><?php echo $value->a2012; ?></td>
                        <td><?php echo $value->a2013; ?></td>
                        <td><?php echo $value->a2014; ?></td>
                        <td><?php echo $value->a2015; ?></td>
                        
                    </tr>
                    <?php
                          }
                        }
                    ?>
                    </tbody>
                </table>
                <?php
                
//                $indisec = $this->session->userdata('indisec');
//                for ($i = 0; $i < count($indisec); $i++) {
//                    echo $indisec[$i][0].' | '.$indisec[$i][1].'<br>';
//                }
                ?>
                
                
                
                <?php
                        }else{
                            echo '<p class="bg-danger"><b>Error</b>: No existen datos, seleccionar sector y indicador.</p>';
                        }
                    }else{
                        echo '<p class="bg-danger"><b>Error</b>: No existen datos, seleccionar sector y indicador.</p>';
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


