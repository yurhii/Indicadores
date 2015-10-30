<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_Consulta');
    }
    public function index()
    {   
        $data['contenido'] = 'indicador';
        $data['query'] = $this->Model_Consulta->listaSector();        
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

    

//-----------
    public function buscar_indicadores(){
        $datos = $this->Model_Consulta->listIndiSec();        
        echo json_encode($datos);        
    }
    
    public function tablareg(){
        
        $mypost = $this->input->post();
        if(isset($mypost)){
            if(isset($_POST['listaIndicador'])){                
            $checkIndi = $_POST['listaIndicador'];
            $datostablaReg = $this->Model_Consulta->mtablaReg();  
            $datosiglaSec = $this->Model_Consulta->msiglaSector();
            print_r($this->Model_Consulta->mselIndicador());
            
            $data['contenido'] = 'tablareg';
            $data['datostablaReg'] = $datostablaReg;
            $data['datosiglaSec'] = $datosiglaSec;
            $this->load->view('tablareg', $data);
            }else{                
                $data['datostablaReg'] = 'Error';
                $this->load->view('tablareg',$data);
            }
        }else{
            $data['datostablaReg'] = 'Error';
            $this->load->view('tablareg',$data);
        }
    }
    public function tablapro(){
        
    }

    public function reportetabla(){
        $dataTable = array();
        $abc = $this->input->post();
        if(isset($abc)){
            if(isset($_POST['listaIndicador'])){
                
            
            $checkIndi = $_POST['listaIndicador'];
            $indis = $this->Model_Consulta->listIndiSession();
            //print_r($checkIndi);
            //echo '<br>';
            //$dataTable=array();
            $i = 0;
            foreach ($checkIndi as $value1){
                $v1 = (String)$value1;
                foreach ($indis as $value2) {
                    //idformindicador,valor,periodo
                    $valcomp = (String)$value2->idformindicador.''.$value2->valor.''.$value2->periodo;
                    if($v1 == $valcomp){
                        $dataTable[$i] = array("t_valor"=>(String)($value2->valor),
                            "t_periodo"=>(String)($value2->periodo),
                            "t_sigla"=>(String)($value2->sigla),
                            "t_indicador"=>(String)($value2->nombreindicador),
                            "t_sector"=>(String)($value2->abrsector),
                            "t_localidad"=>(String)($value2->localidad)
                            );                        
                    }
                }
                $i = $i + 1;
            } 
            
            //echo json_encode($dataTable);
            $data['contenido'] = 'reportetabla';
            $data['dataTable'] = $dataTable;
            $this->load->view('reportetabla', $data);
            
//            print_r($dataTable);
//            echo '<br>';
//            foreach ($dataTable as $value) {
//                echo $value['t_sigla'];
//            }
//            exit;
            }else{
                //return FALSE;
                $data['dataTable'] = $dataTable;
                $this->load->view('reportetabla',$data);
            }
        }else{
            $data['dataTable'] = $dataTable;
            $this->load->view('reportetabla',$data);
        }
    }    
}

