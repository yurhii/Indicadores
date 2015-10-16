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
    public function datajs(){
        $r = $this->input->post();
        if(isset($r)){
            $a = $_POST['listaSector'];
            print_r($a);
            echo 'post';exit;
        }else{
            echo 'no post'; exit;
        }
    }
}

