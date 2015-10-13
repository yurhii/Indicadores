<div class="row">
    
<!--     <div class="col-xs-6 col-sm-4">-->
<div class="col-md-4">
         <center>SELECCIONAR SECTOR(ES)</center>
    <div class="panel panel-primary">
            <div class="panel-body">
                  <form id="form-sector" >
<!--                  <div style="overflow: auto; height:350px; width: 100%;">-->
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
		foreach($query as $value)
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
                                  <?php echo $value->sigla; ?>
                              </td>
                          </tr>
        
		<?php
		}
		?>  
                        </tbody>
                      </table>
<!--                  </div> <br>-->
 
                    <center>
                        <b>Localidad</b>
                    </center>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <table class="table table-condensed">
                                <tr>
                                    <td>Región/Pronvincia:</td>
                                    <td>Distrital:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select>
                                            <option value="">Seleccionar</option>
                                            <option>Región Apurímac</option>                                
                                            <option>Abancay</option>                                
                                            <option>Andahuaylas</option>
                                            <option>Antabamba</option>
                                            <option>Aymaraes</option>
                                            <option>Cotabambas</option>
                                            <option>Chincheros</option>                                                                                                
                                            <option>Grau</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select>
                                            <option></option>
                                        </select>                                        
                                    </td>
                                </tr>
                            </table>
                            </div>
                    </div>
                    <center>
                        <b>Periodo</b>
                    </center>

                    <div class="row">
                        
                        <div class="col-md-12">
                        <table class="table table-condensed">
                            <tr>
                                <td>Fecha Inicial:</td>
                                <td>
                                    <select>
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>                                        
                                    </select>
                                    
                                </td>
                                <td>
                                    <select>
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>                                                                            
                                    </select>
                                    
                                </td>
                                <td>
                                    <select>
                                        <option>2001</option>
                                        <option>2002</option>
                                        <option>2003</option>
                                        <option>2004</option>
                                        <option>2005</option>
                                        <option>2006</option>
                                        <option>2007</option>
                                        <option>2008</option>
                                        <option>2009</option>
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>                                                                             
                                    </select>
                                    
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Fecha Final:</td>
                                <td>
                                    <select>
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>                                        
                                    </select>
                                </td>
                                <td>
                                    <select>
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>                                                                            
                                    </select>
                                </td>
                                <td>
                                    <select>
                                        <option>2001</option>
                                        <option>2002</option>
                                        <option>2003</option>
                                        <option>2004</option>
                                        <option>2005</option>
                                        <option>2006</option>
                                        <option>2007</option>
                                        <option>2008</option>
                                        <option>2009</option>
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>                                                                             
                                    </select>
                                </td>
                            </tr>
                        </table>                        
                            </div>
                    </div>
                    <br>
                    <center>
                        <button type="button" id="btnListar" class="btn btn-default">Mostrar Indicadores</button>
                    </center>
                  </form> <!--fin form para cargar indicadores-->
                    
            </div>
          </div>
  </div>
    
    
   
        
    
    <div class="col-md-8">
        
        
        
        
        <center>SELECCIONAR INDICADOR(ES)</center>
        <div class="panel panel-primary">  
            <div class="panel-body">
                
                <form method="post" action="<?php echo base_url()?>consulta/mostrar">
                  <div style="overflow: auto; height:338px; width: 100%;">
                      <!--class="table table-bordered"  -->
                      <div id="listaIndicadores">
    
                      </div>               
                  </div>
                  <br>
                  <center>
                       <input type="submit" value="Mostrar Localidad y Periodo" class="btn btn-primary">
                  </center>
                </form>
                
            </div>
        </div>
    
    </div>
    
 
    
</div>