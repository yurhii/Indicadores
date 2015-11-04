<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_Consulta');
    }
    public function index()
    {   
        $data['contenido'] = 'indicador';        
	$this->load->view('plantilla', $data);
    }
    public function indiregional(){
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
//            echo json_encode($series_data);
//            exit;
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
 
}

