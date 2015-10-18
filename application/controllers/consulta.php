<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_Consulta');
    }

    public function index()
    {   
        $data['contenido'] = 'consulta';
        $data['query'] = $this->Model_Consulta->listaSector();        
	$this->load->view('plantilla', $data);
    }    
    public function mostrar_indi(){
        //$ids = (explode(',', $this->input->get_post('ids')));
        //$this->Model_Consulta->mostrar_indi($ids);           
        $this->Model_Consulta->mostrar_indi();
        
    }
    public function fillgrid(){
        $this->mostrar_indi();
    }

    public function checkLista(){
        $listcheck = $this->input->post();
        
        if($listcheck){
            print_r($listcheck['listaSector']); exit;
        }
    }
    public function llenar_indi(){
        //$a = $this->input->post();
        //print_r($a); exit;
        $this->Model_Consulta->llenar_indi2();        
    }
    public function llena_indicadores(){
        $options = "";
		if($this->input->post('sector'))
		{
			$sector = $this->input->post('sector');
			$indicadores = $this->Model_Consulta->indicadores($sector);
			foreach($indicadores as $fila)
			{
			
				echo '<option value='.$fila->ind_id.'>'.$fila->ind_name.'</option>';
			
			}
		}
    }
    public function buscar_indicadores(){
        //echo "entro"; exit;
        //$listcheck = $this->input->post();
        $datos = $this->Model_Consulta->llenar_indi2();  
        echo json_encode($datos);
        //print_r($listcheck);
    }
    public function mostrar(){
        $datos = $this->Model_Consulta->llenar_indi2();
        echo json_encode($datos);
    }
}
