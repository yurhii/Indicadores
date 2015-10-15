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
        //echo "entro"; exit;
        //$listcheck = $this->input->post();
        $datos = $this->Model_Consulta->listIndiSec();  
        echo json_encode($datos);
        //print_r($listcheck);
    }
    public function cargarDistritos(){
        if($this->input->post('provincia')){
            $provincia = $this->input->post('provincia');
            $distritos = $this->Model_Consulta->lisDisxPro($provincia);
            foreach ($distritos as $value) {
                echo '<option value='.$value->idrepterritorial.'>'.$value->nombre.'</option>';
            }
        }        
    }
}

