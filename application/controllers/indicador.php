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
            $data['contenido'] = 'tablaindireg';
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

