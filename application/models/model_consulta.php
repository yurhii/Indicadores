<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//@01   yomaco  19/10/15    agregando session para recuperar parametros y hacer comparacion
                            //y generara la tabla

class Model_Consulta extends CI_Model {

    var $lista = array();
    
    
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
        
        if(isset($_POST['listaSector'])){
            $datosForm = $this->input->post();//recuperando datos del formulario para mostrar indicadores
            //cargar lista de sectores seleccionados
            $valor = $_POST['listaSector'];            
            //$lista = array();
            foreach ($valor as $value) {
                $lista[] = $value;                
            }
            $idsectores = implode(',', $lista);        //concatenando id de cada sector       
            
            $datosComp = array('selsector'=>$idsectores);         
            $this->session->set_userdata($datosComp);            
            
            $query = $this->db->query("SELECT f.idelemento,c.nombre,fi.idfuenteinformacion,fi.sigla
	FROM formindicador a, repterritorial b, formula c ,formvarterri e,indicador f, unidadmedida g, fuenteinformacion fi
	WHERE a.idrepterritorial = b.idrepterritorial	
	AND a.idformula = c.idformula
	AND a.idformindicador = e.idformindicador
	AND c.idformula = f.idformula
	AND f.idunidadmedida = g.idunidadmedida
	and b.idrepterritorial = a.idrepterritorial
	and fi.idfuenteinformacion = e.idfuenteinformacion		
	AND fi.idfuenteinformacion IN ($idsectores) --159,151,64
	GROUP BY f.idelemento,c.nombre,fi.idfuenteinformacion,fi.sigla
	ORDER BY f.idelemento;");                      
                return $query->result();

        }else{
            return FALSE;
        }
    }    
    public function mtablaReg(){
        
        $datosForm = $this->input->post();
        $fi_dia = $datosForm['fi_dia'];
        $fi_mes = $datosForm['fi_mes'];
        $fi_anio = $datosForm['fi_anio'];
        $fechaInicial = $fi_anio.'-'.$fi_mes.'-'.$fi_dia;
        
        // recuperando fecha final
        $ff_dia = $datosForm['ff_dia'];
        $ff_mes = $datosForm['ff_mes'];
        $ff_anio = $datosForm['ff_anio'];
        $fechaFinal = $ff_anio.'-'.$ff_mes.'-'.$ff_dia;
        
        $valor = $_POST['listaIndicador'];            
        //$lista = array();
        foreach ($valor as $value) {
            $lista[] = $value;                
        }
        $idsindicadores = implode(',', $lista);
        $idsectores = (String)$this->session->userdata('selsector');
        
        $query = $this->db->query("SELECT 
	A .idformindicador,	b.idrepterritorial,	b.nombre as localidad,	b.codigo,f.idelemento,	C .nombre as nombreindicador,fi.sigla as abrSector,	e.idfuenteinformacion,	fi.nombre,di.valor,G .sigla,	date_part('year', e.fechadatoini) :: CHARACTER VARYING AS periodo
FROM
	formindicador A,	repterritorial b,	formula C,	formvarterri e,	indicador f,	unidadmedida G,	fuenteinformacion fi, datoindicador di
WHERE
	A .idrepterritorial = b.idrepterritorial
	AND A .idformula = C .idformula
	AND A .idformindicador = e.idformindicador
	AND C .idformula = f.idformula
	AND f.idunidadmedida = G .idunidadmedida
	AND b.idrepterritorial = A .idrepterritorial
	AND fi.idfuenteinformacion = e.idfuenteinformacion

	AND di.fechadatoini = e.fechadatoini
	AND di.idrepterritorial = b.idrepterritorial
	AND di.idfuenteinformacion = fi.idfuenteinformacion
	AND di.idvariables = e.idvariables

	AND fi.idfuenteinformacion IN ($idsectores)
	AND f.idelemento in ($idsindicadores)
	AND b.idrepterritorial = 280
	AND e.fechadatoini BETWEEN '$fechaInicial' AND '$fechaFinal'
	GROUP BY 	f.idelemento,di.valor,fi.nombre,	A .idformindicador,	b.idrepterritorial,	b.nombre,	b.codigo,	C .nombre,fi.sigla,	e.idfuenteinformacion,	C .formula,
	A .idrepterritorial,	e.idfuenteinformacion,	e.idmetodocaptura,	G .sigla,	e.fechadatoini
	ORDER BY A.idformindicador;");                
        return $query->result();
    }
    
    public function mtablaPro(){
        $query = $this->db->query("");                
        return $query->result();
    }
}