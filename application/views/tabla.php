<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">                
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url('public/img/favicon.ico')?>" rel="icon" type="image/x-icon" />
        <title>Reporte Indicadores Regional</title>        
        <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet" media="screen">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo base_url('public/js/bootstrap.min.js') ?>"></script>        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="<?php echo base_url('public/highcharts/js/highcharts.js')?>"></script>
        <script src="<?php echo base_url('public/highcharts/js/modules/exporting.js')?>"></script>
       <!-- <script src="<?php echo base_url('public/js/jquery-2.0.2.js') ?>"></script>        -->
        <script src="<?php echo base_url('public/js/jquery.PrintArea.js') ?>"></script>        
        


        
    </head>
    <body style="margin-bottom: 0; padding: 0;">    
        
        
        
        <div id="printme"><center>
        <img width="100%" src="<?php echo base_url()?>public/img/siar2015.jpg">
    </center>
        
    <br>
    <br>
        
        <div class="contenido" id="container">       
           
            <br>
            <div class="col-md-12">
               	<?php                
                    if($datostablaReg!='Error'){
                        if(count($datostablaReg)>0){
                            
                ?>
                
                
                    
                <table class="table table-bordered" border="1">
                    <?php $anios = array("2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015");?>
                    <thead style="background-color: #D9EDF7">
                    
                    <th><center>Sector</center></th>
                    <th><center>Indicador</center></th>
                    <th><center><span class="glyphicon glyphicon-signal" aria-hidden="true"></span></center></th>
                    
                    <th><center>U.Medida</center></th>
                        <?php
                            foreach ($anios as $value) {
                                echo '<th><center>'.$value.'</center></th>';
                            }
                        ?>
                    
                    </thead>
                    <tbody>
                        
                    <?php    
                    $indisec = $this->session->userdata('indisec');
                    $colores = array('#7CB5EC','#434348','#90ED7D','#F7A35C','#8085E9','#F15C80','#E4D354','#2B908F','#F45B5B','#91E8FF');                
                    $cantidad = 0;
                          foreach ($datostablaReg as $valued) {                              
                              foreach ($valued as $value) {
                                  
                              ?>
                    <tr>
                        
                        <?php 
                        
                        for ($i = 0; $i < count($indisec); $i++){
                            $unionindisec = $indisec[$i][0].' '.$indisec[$i][1];
                            if($unionindisec==$value->nombre){
                                echo '<td>'.$indisec[$i][1].'</td>';                                
                                echo '<td>'.$indisec[$i][0].'</td>';
                                echo '<td><center><a class="open-Modal btn-default"  data-id="'.$value->nombre.'" role="button" data-toggle="modal" data-target=".bs-example-modal-lg" title="Ver Gráfico"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span></a></center></td>';
                                //echo '<td><button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg">'.$indisec[$i][0].'</button></td>';
                                echo '<td><center>'.$indisec[$i][2].'</center></td>';
                            }
                        } ?>
                    
                        <td>
<!--                            <a class="open-Modal btn btn-default"  data-id='".<?php echo $value->a2005?>."' role='button' data-toggle='modal' data-target=".bs-example-modal-lg">abc</a>-->
                        
                        <?php if($value->a2005 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>                            
                            <?php echo $value->a2005; ?>                            
                        </center>
                        <?php }?>
                        </td>
                        
                        <td>
                            <?php if($value->a2006 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>
                            
                            <?php echo $value->a2006; ?>
                       </center><?php }?>
                        </td>
                        <td><?php if($value->a2007 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                            <center>
                            
                            <?php echo $value->a2007; ?>
                            
                            </center><?php }?>
                        </td>
                        <td><?php if($value->a2008 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>
                            
                            <?php echo $value->a2008; ?>
                        </center><?php }?>
                        </td>
                        <td><?php if($value->a2009 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>                        
                            <?php echo $value->a2009; ?>
                        </center><?php }?>
                        </td>
                        <td><?php if($value->a2010 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>
                            
                            <?php echo $value->a2010; ?>
                        </center><?php }?>
                        </td>
                        <td><?php if($value->a2011 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>
                            
                            <?php echo $value->a2011; ?>
                        </center><?php }?>
                        </td>
                        <td><?php if($value->a2012 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>
                            
                            <?php echo $value->a2012; ?>
                                </center><?php }?>
                        </td>
                        <td><?php if($value->a2013 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>
                            
                            <?php echo $value->a2013; ?>
                        </center><?php }?>
                        </td>
                        <td><?php if($value->a2014 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>                            
                            <?php echo $value->a2014; ?>
                        </center><?php }?>
                        </td>
                        <td><?php if($value->a2015 == ''){
                            echo '<center>0</center>';
                        }else{
                        ?>
                        <center>                            
                            <?php echo $value->a2015; ?>
                        </center><?php }?>
                        </td>
                        
                    </tr>
                    <?php                       
                        $cantidad++;
                        
                          }
                        }
                    ?>
                    </tbody>
                </table>
                <div class="pull-right" ><button  id="imprimir" class="btn btn-sm"  title="Imprimir"><span class="glyphicon glyphicon-print"></span></button></div>
                                        
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                   
                    <div class="modal-dialog" role="document">                                        
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                            
                          </div>
                        <div class="modal-dialog modal-body">
                            <div id="containerUno" style="min-width: 550px; height: auto;"></div>                        
                        </div>                        
                    </div>
                  </div>
                </div>             
                
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
        </div>
        <footer>
            <center>
                <h4>                   
                    </h4> &copy; Indicadores - 2015
                    <!--by facebook.com/ymamanic-->
                </center>
        </footer>
    </body>       
</html>


<script>
    $(document).on("click", ".open-Modal", function () {
        var Codigo = ($(this).data("id"));
        //alert(Codigo);
        var registros = eval(<?php echo $series_data;?>);        
        for (var i = 0; i < registros.length; i++) {
            if(Codigo===registros[i]["name"]){
                
                $('#containerUno').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: 'Valor: Indicadores'
                    },
                    xAxis: {
                        categories: [
                            '2005',
                            '2006',
                            '2007',
                            '2008',
                            '2009',
                            '2010',
                            '2011',
                            '2012',
                            '2013',
                            '2014',
                            '2015'

                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Valores'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{name:registros[i]["name"],data:registros[i]["data"]}]
                });   
            } 
            
        };
    });
</script>
<!--<script>

$('#imprimir').click(function(){

    window.print();
    return false;
});
</script>-->
<script type="text/javascript">
$(document).ready(function() {
    $("#imprimir").click(function () {
        $("#printme").printArea();
        
    });
});
</script>