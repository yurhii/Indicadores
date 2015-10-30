<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">                
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url('public/img/favicon.ico')?>" rel="icon" type="image/x-icon" />
        <title>Reporte Indicadores Regional</title>
    </head>
    <body style="margin-bottom: 0; padding: 0;">       
    <center>
        <img width="100%" src="<?php echo base_url()?>public/img/siar2015.jpg">
    </center>
        
        <div class="contenido" id="container">            
            <div class="col-md-12">
               	<?php
                $nombresindi = $this->session->userdata('nombreindi');
                //echo $nombresindi[0];
                //echo $nombresindi[1];
                    if($datostablaReg!='Error'){
                        if(count($datostablaReg)>0){
                ?>
                
                        <?php
                            //print_r($datostablaReg);
                            $anios = array("2004","2005","2006","2007","2008","2009","2010","2011");                            
                            //$anios = array("2004","2001","2006","2007","2008","2009","2010","2011","2004","2001","2006","2007","2008","2009","2010","2011");
//                        $anios = array(
//                                    array("2004","2004"),
//                                    array("2001","2001"),
//                                    array("2006","2006"),
//                                    array("2007","2007"),
//                                    array("2008","2008"),
//                                    array("2009","2009"),
//                                    array("2010","2010"),
//                                    array("2011","2011"),
                                    //);
                        print_r($anios);
                        echo '<br>----<br>';
                        echo count($anios)/2;
                        echo '<br>----<br>';
                        echo $anios[0].'<br>';
                        echo $anios[1].'<br>';
                        $array = json_decode(json_encode($datostablaReg), true);
                        print_r($array[0]);
                            echo '<br>';
                            
                            $a = 0;
                            for ($i = 0; $i < count($datostablaReg); $i++) {
                                if($a<count($anios)){
                                    //$matriz[$i][0] = $anios[$a][0];
                                    $matriz[$i][0] = $anios[$a];
                                    $a = $a + 1;
                                }                           
                            }       
                            print_r($matriz);
                            echo '<br>------------s';
                            

                            
                            
                                
                                for ($j = 0; $j < count($this->session->userdata('nombreindi')); $j++) {  
                                    
                                    for ($k = 0; $k < count($nombresindi); $k++) {
                                        //$matriz[$i][1] = $array[$i]['valor'];
                                        //$matriz[$i][$j] = $array[$i]['valor'];
                                        for ($l = 0; $l < count($anios); $l++) {
                                            
                                            for ($i = 0; $i < count($datostablaReg); $i++) {
                                            
                                            if($array[$i]['periodo']===$anios[$i]){
                                                if($array[$i]['nombreindicador']===$nombresindi[$k]){
                                                    //echo $k.'|'.$nombresindi[$k].'<br>';
                                                    $matriz[$i][$j+1] = $array[$i]['valor'];                                                    
                                                }
                                            }else{
                                                $matriz[$i][$j+1] = 0;                                             
                                            }
                                        }
                                                                                                                            
                                    }                                    
                                }
                            }
                            //print_r($matriz);
//                            echo '<br>';
//                            //print_r($matriz);
                            echo '<br><br>-------------<br>';
                            for ($i = 0; $i < count($anios); $i++) {                                
                                //echo $array[$i]['periodo'].'-'.$anios[$i].'<br>';
                                
                                for ($j = 0; $j < count($this->session->userdata('nombreindi'))+1; $j++) {
                                    echo $matriz[$i][$j].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|| ';
                                }
                                echo '<br>';
                            }
                        
                        ?>
                                
                
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


