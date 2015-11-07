<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_Consulta');
        
    }
//    public function index()
//    {   
//        $data['contenido'] = 'indicador';        
//	$this->load->view('plantilla', $data);
//    }
    public function index(){
        $data['contenido'] = 'indiregional';        
        $data['listaSecReg'] = $this->Model_Consulta->listaSecReg();
	$this->load->view('plantilla', $data);
    }
    public function indiprovincial(){
        $data['contenido'] = 'indiprovincial';        
        $data['listaSecPro'] = $this->Model_Consulta->listaSecPro();
	$this->load->view('plantilla', $data);
    }
    public function indidistrital(){
        $data['contenido'] = 'indidistrital';        
        $data['listaSecDis'] = $this->Model_Consulta->listaSecDis();
	$this->load->view('plantilla', $data);
    }
    public function buscarindireg(){
        $datos = $this->Model_Consulta->buscarIndiReg();
        echo json_encode($datos);
    }
    public function tablaindireg(){      
        $mypost = $this->input->post();
        if(isset($mypost)){
            if(isset($_POST['listaIndicador'])){            
            $checkIndi = $_POST['listaIndicador'];            
            $datostablaReg = $this->Model_Consulta->datosTablaReg();
            
            foreach ($datostablaReg as $value) {
                foreach ($value as $key=>$value2) {
                    $valor[0] = (float)($value2->a2005);
                    $valor[1] = (float)($value2->a2006);
                    $valor[2] = (float)($value2->a2007);
                    $valor[3] = (float)($value2->a2008);
                    $valor[4] = (float)($value2->a2009);
                    $valor[5] = (float)($value2->a2010);
                    $valor[6] = (float)($value2->a2011);
                    $valor[7] = (float)($value2->a2012);
                    $valor[8] = (float)($value2->a2013);
                    $valor[9] = (float)($value2->a2014);
                    $valor[10] = (float)($value2->a2015);
                    
                    $series_data[] = array('name'=>$value2->nombre,'data'=>$valor);
                }
            }
            $data['contenido'] = 'tablaindireg';
            $data['series_data'] = json_encode($series_data);
            $data['datostablaReg'] = $datostablaReg;            
            $this->load->view('tablaindireg', $data);
            }else{
                $data['datostablaReg'] = 'Error';
                $this->load->view('tablaindireg',$data);
            }
        }else{
            $data['datostablaReg'] = 'Error';
            $this->load->view('tablaindireg',$data);
        }
    }
    public function exportExcel(){
        
        $mypost = $this->input->post();        
        if(isset($mypost)){
            if(isset($_POST['listaIndicador'])){
//            if(isset($_POST['sector'])){
//                print_r($_POST['sector']);
//                echo '<br>';
//                print_r($_POST['indicador']);
//                echo '<br>';
//                print_r($_POST['unimedida']);
//                echo '<br>';
//                exit;
                
            $localidad = $_POST['txtLocalidad'];            
            $datostablaReg = $this->Model_Consulta->datosTablaReg();
                        
            $this->load->library('libexcel/PHPExcel');
            //Create a new Object
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->setShowGridlines(false);
            if($localidad=='Regional'){
                $objPHPExcel->getActiveSheet()->setCellValue('C1', 'REGIONAL');
            }
            if($localidad=='Provincial'){
                $objPHPExcel->getActiveSheet()->setCellValue('C1', 'PROVINCIAL');
            }
            if($localidad=='Distrital'){
                $objPHPExcel->getActiveSheet()->setCellValue('C1', 'DISTRITAL');
            }
            
            foreach(range('B','O') as $columnID)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }
            
            $objPHPExcel->getActiveSheet()->setCellValue('B3', 'SECTOR');
            //$objPHPExcel->getActiveSheet()->getColumnDimension('')->setAutoSize(TRUE);
            $objPHPExcel->getActiveSheet()->setCellValue('C3', 'INDICADOR');
            //$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
            $objPHPExcel->getActiveSheet()->setCellValue('D3', 'U.Medida');
            $objPHPExcel->getActiveSheet()->setCellValue('E3', '2005');
            $objPHPExcel->getActiveSheet()->setCellValue('F3', '2006');
            $objPHPExcel->getActiveSheet()->setCellValue('G3', '2007');
            $objPHPExcel->getActiveSheet()->setCellValue('H3', '2008');
            $objPHPExcel->getActiveSheet()->setCellValue('I3', '2009');
            $objPHPExcel->getActiveSheet()->setCellValue('J3', '2010');
            $objPHPExcel->getActiveSheet()->setCellValue('K3', '2011');
            $objPHPExcel->getActiveSheet()->setCellValue('L3', '2012');
            $objPHPExcel->getActiveSheet()->setCellValue('M3', '2013');
            $objPHPExcel->getActiveSheet()->setCellValue('N3', '2014');
            $objPHPExcel->getActiveSheet()->setCellValue('O3', '2015');

            $centerCell = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                    )
                );
            $indisec = $this->session->userdata('indisec');
            $contador = 4;
            foreach ($datostablaReg as $value) {
                foreach ($value as $value2) {                    
                    
                    foreach(range('D','O') as $columnID)
                    {
                        $objPHPExcel->getActiveSheet()->getStyle($columnID.''.$contador)->applyFromArray($centerCell);                        
                    }
                    
                    for ($i = 0; $i < count($indisec); $i++) {
                            $unionindisec = $indisec[$i][0].' '.$indisec[$i][1];
                            if($unionindisec==$value2->nombre){
                                $sector = $indisec[$i][1];                     
                                $indicador = $indisec[$i][0];                   
                                $simbolo = $indisec[$i][2];                                
                            }                        
                        }
                    if(($value2->a2005)==''){
                        $a2005 = 0;
                    }else{
                        $a2005 = ($value2->a2005);
                    }
                    if(($value2->a2006)==''){
                        $a2006 = 0;
                    }else{
                    $a2006 = ($value2->a2006);
                    }
                    if(($value2->a2007)==''){
                        $a2007 = 0;
                    }else{
                    $a2007 = ($value2->a2007);
                    }
                    if(($value2->a2008)==''){
                        $a2008 = 0;
                    }else{
                    $a2008 = ($value2->a2008);
                    }
                    if(($value2->a2009)==''){
                        $a2009 = 0;
                    }else{
                    $a2009 = ($value2->a2009);
                    }
                    if(($value2->a2010)==''){
                        $a2010 = 0;
                    }else{
                    $a2010 = ($value2->a2010);
                    }
                    if(($value2->a2011)==''){
                        $a2011 = 0;
                    }else{
                    $a2011 = ($value2->a2011);
                    }
                    if(($value2->a2012)==''){
                        $a2012 = 0;
                    }else{
                    $a2012 = ($value2->a2012);
                    }
                    if(($value2->a2013)==''){
                        $a2013 = 0;
                    }else{
                    $a2013 = ($value2->a2013);
                    }
                    if(($value2->a2014)==''){
                        $a2014 = 0;
                    }else{
                    $a2014 = ($value2->a2014);
                    }
                    if(($value2->a2015)==''){
                        $a2015 = 0;
                    }else{
                    $a2015 = ($value2->a2015);
                    }
                    $objPHPExcel->getActiveSheet()->setCellValue('B'.$contador, $sector);
                    $objPHPExcel->getActiveSheet()->setCellValue('C'.$contador, $indicador);                    
                    $objPHPExcel->getActiveSheet()->setCellValue('D'.$contador, $simbolo);
                    $objPHPExcel->getActiveSheet()->setCellValue('E'.$contador, $a2005);
                    $objPHPExcel->getActiveSheet()->setCellValue('F'.$contador, $a2006);
                    $objPHPExcel->getActiveSheet()->setCellValue('G'.$contador, $a2007);
                    $objPHPExcel->getActiveSheet()->setCellValue('H'.$contador, $a2008);
                    $objPHPExcel->getActiveSheet()->setCellValue('I'.$contador, $a2009);
                    $objPHPExcel->getActiveSheet()->setCellValue('J'.$contador, $a2010);
                    $objPHPExcel->getActiveSheet()->setCellValue('K'.$contador, $a2011);
                    $objPHPExcel->getActiveSheet()->setCellValue('L'.$contador, $a2012);
                    $objPHPExcel->getActiveSheet()->setCellValue('M'.$contador, $a2013);
                    $objPHPExcel->getActiveSheet()->setCellValue('N'.$contador, $a2014);
                    $objPHPExcel->getActiveSheet()->setCellValue('O'.$contador, $a2015);
                    $contador++;
                }
            }
            
             $styleArray = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                    ),
                    'font' =>array(
                        'bold'  => true
                    ),
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'E0E0E0')
                    )
                );             
                $objPHPExcel->getActiveSheet()->getStyle('B3:O3')->applyFromArray($styleArray);
            
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="tuexcel.xls"');
            header('Cache-Control: max-age=0');

            $objWriter->save('php://output');
            exit();
            
            }else{
                echo '<center><img width="100%" src="'.base_url('public/img/siar2015.jpg').'"></center>';
                echo '<br><p class="bg-danger"><b>Error</b>: No existen datos, seleccionar sector y indicador.</p>';
            }
        }else{
                echo '<center><img width="100%" src="'.base_url('public/img/siar2015.jpg').'"></center>';
                echo '<br><p class="bg-danger"><b>Error</b>: No existen datos, seleccionar sector y indicador.</p>';
        }
    }
}

