<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_Consulta extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listaSector() {        
        $query = $this->db->query("
            SELECT f.idfuenteinformacion, rt.idrepterritorial,f.nombre as nombresector, f.idtipofuenteinfo,f.sigla, rt.nombre
            FROM repterritorial rt 
			INNER JOIN elemento el on rt.idrepterritorial = el.idrepterritorial and rt.codigo = '030000'			
			INNER JOIN elemento_has_fuenteinfo elf on elf.idelemento = el.idelemento
			INNER JOIN fuenteinformacion f on f.idfuenteinformacion = elf.idfuenteinformacion and f.idtipofuenteinfo = 1
            GROUP BY f.idfuenteinformacion, rt.nombre,rt.idrepterritorial
            ORDER BY f.idfuenteinformacion;
                 ");
        return $query->result();          
    }    
    public function listIndiSec(){
        
        
        
        $valor = $_POST['listaSector'];
        //print_r($valor); exit;
        //$data = $this->input->post();                
        $lista = array();
        //print_r($lista); exit;
        foreach ($valor as $value) {
            $lista[] = $value;
            //foreach ($value as $valor) {
                //$lista[] = $valor;                
            //}
        }
        
        $ids = implode(',', $lista);        
        //echo $ids; exit;
        $query = $this->db->query("
            SELECT a.idformindicador, b.idrepterritorial,b.nombre as localidad, b.codigo ,c.nombre as nombreindicador, e.idfuenteinformacion, fi.nombre,
	g.sigla,date_part('year',e.fechadatoini)::CHARACTER VARYING as periodo
            FROM formindicador a, repterritorial b, formula c ,formvarterri e,indicador f, unidadmedida g, fuenteinformacion fi
            WHERE a.idrepterritorial = b.idrepterritorial	
            AND a.idformula = c.idformula
            AND a.idformindicador = e.idformindicador
            AND c.idformula = f.idformula
            AND f.idunidadmedida = g.idunidadmedida
            and b.idrepterritorial = a.idrepterritorial
            and fi.idfuenteinformacion = e.idfuenteinformacion		
            and fi.idfuenteinformacion in ($ids)
            GROUP BY fi.nombre,a.idformindicador,b.idrepterritorial,b.nombre,b.codigo,c.nombre,
                e.idfuenteinformacion, c.formula,a.idrepterritorial,e.idfuenteinformacion,
                e.idmetodocaptura,g.sigla,e.fechadatoini;
                 ");
        //print_r($query->result());exit;
        return $query->result();   
        
    }
}