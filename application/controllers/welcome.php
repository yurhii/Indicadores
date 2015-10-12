<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_Consulta');
    }

    public function index()
    {
        $data['query'] = $this->Model_Consulta->all();
	$this->load->view('welcome_message', $data);
    }
    public function add(){
        $post = $this->input->post();
        if($post){
            echo 'ingreso al post ->'.$post['txtNombre']; exit;
        }else{
            echo 'no ingreso al post';exit;
        }        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */