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
    public function buscar_indicadores(){
        $datos = $this->Model_Consulta->listIndiSec();
        echo json_encode($datos);
        
    }
    public function cargarDistritos(){
        if($this->input->post('provincia')){
            $provincia = $this->input->post('provincia');
            if($_POST['provincia'] == '030000'){
                echo "<option value='030000'></option>";
            }else{
            $distritos = $this->Model_Consulta->lisDisxPro($provincia);
            foreach ($distritos as $value) {
                echo '<option value='.$value->idrepterritorial.'>'.$value->nombre.'</option>';
            }
            }
        }
    }
    public function reportetabla(){
        $datosTabla = array();
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
            
            echo json_encode($dataTable);
            
//            print_r($dataTable);
//            echo '<br>';
//            foreach ($dataTable as $value) {
//                echo $value['t_sigla'];
//            }
//            exit;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }
}

