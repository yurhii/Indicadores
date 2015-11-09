<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Consulta extends CI_Model {

    var $lista = array();

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function listaSecReg(){
        $query = $this->db->query("SELECT e.idfuenteinformacion, e.nombre as nombresector, e.sigla as siglasector
        FROM formula a, formindicador b, formvarterri c, repterritorial d, fuenteinformacion e
        WHERE a.idformula = b.idformula
        AND b.idformindicador = c.idformindicador
        AND c.idrepterritorial = d.idrepterritorial
        AND d.idrepterritorial = 280
        AND c.idfuenteinformacion = e.idfuenteinformacion
        GROUP BY e.idfuenteinformacion,e.nombre
        ORDER BY e.nombre ASC;");
        return $query->result();
    }
    public function listaSecPro(){
        $query = $this->db->query("SELECT e.idfuenteinformacion, e.nombre as nombresector, e.sigla as siglasector
        FROM formula a, formindicador b, formvarterri c, repterritorial d, fuenteinformacion e
        WHERE a.idformula = b.idformula
        AND b.idformindicador = c.idformindicador
        AND c.idrepterritorial = d.idrepterritorial
        AND d.idpadre = 280
        AND c.idfuenteinformacion = e.idfuenteinformacion
        GROUP BY e.idfuenteinformacion,e.nombre
        ORDER BY e.nombre ASC;");
        return $query->result();
    }
    public function listaSecDis(){
        $query = $this->db->query("SELECT e.idfuenteinformacion, e.nombre as nombresector, e.sigla as siglasector
        FROM formula a, formindicador b, formvarterri c, repterritorial d, fuenteinformacion e
        WHERE a.idformula = b.idformula
        AND b.idformindicador = c.idformindicador
        AND c.idrepterritorial = d.idrepterritorial
        AND d.idpadre in (281,291,311,319,337,344,353)
        AND c.idfuenteinformacion = e.idfuenteinformacion
        GROUP BY e.idfuenteinformacion,e.nombre
        ORDER BY e.nombre ASC;");
        return $query->result();
    }

    public function buscarIndiReg(){
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
            $localidad = $datosForm['txtLocalidad'];
            
            if($localidad=='Regional'){
            $query = $this->db->query("SELECT a.idformula, a.nombre nombreindicador,e.sigla as abrsector,e.idfuenteinformacion, u.sigla
            FROM formula a, formindicador b, formvarterri c, repterritorial d, fuenteinformacion e, indicador i, unidadmedida u
            WHERE a.idformula = b.idformula
            AND b.idformindicador = c.idformindicador
            AND c.idrepterritorial = d.idrepterritorial
            AND d.idrepterritorial = 280
            AND c.idfuenteinformacion = e.idfuenteinformacion
            AND a.idformula = i.idformula
            AND i.idunidadmedida = u.idunidadmedida
            AND e.idfuenteinformacion in ($idsectores)
            GROUP BY a.idformula,a.nombre,e.sigla,e.idfuenteinformacion,u.sigla
            ORDER BY e.sigla,a.nombre ASC;");
            }
            if($localidad=='Provincial'){
            $query = $this->db->query("SELECT a.idformula, a.nombre nombreindicador,e.sigla as abrsector,e.idfuenteinformacion, u.sigla
            FROM formula a, formindicador b, formvarterri c, repterritorial d, fuenteinformacion e, indicador i, unidadmedida u
            WHERE a.idformula = b.idformula
            AND b.idformindicador = c.idformindicador
            AND c.idrepterritorial = d.idrepterritorial
            AND d.idpadre = 280
            AND c.idfuenteinformacion = e.idfuenteinformacion
            AND a.idformula = i.idformula
            AND i.idunidadmedida = u.idunidadmedida
            AND e.idfuenteinformacion in ($idsectores)
            GROUP BY a.idformula,a.nombre,e.sigla,e.idfuenteinformacion,u.sigla
            ORDER BY e.sigla,a.nombre ASC;");
            }
            if($localidad=='Distrital'){
            $query = $this->db->query("SELECT a.idformula, a.nombre nombreindicador,e.sigla as abrsector,e.idfuenteinformacion, u.sigla
            FROM formula a, formindicador b, formvarterri c, repterritorial d, fuenteinformacion e, indicador i, unidadmedida u
            WHERE a.idformula = b.idformula
            AND b.idformindicador = c.idformindicador
            AND c.idrepterritorial = d.idrepterritorial
            AND d.idpadre in (281,291,311,319,337,344,353)
            AND c.idfuenteinformacion = e.idfuenteinformacion
            AND a.idformula = i.idformula
            AND i.idunidadmedida = u.idunidadmedida
            AND e.idfuenteinformacion in ($idsectores)
            GROUP BY a.idformula,a.nombre,e.sigla,e.idfuenteinformacion,u.sigla
            ORDER BY e.sigla,a.nombre ASC;");
            }
            
            return $query->result();

        }else{
            return FALSE;
        }
    }
    
    public function cargarFomula($idformula){
        $query = $this->db->query("SELECT * FROM formula WHERE idformula IN($idformula);");        
        foreach ($query->result() as $value) {            
            $formulas[] = '('.$value->formula.')';
        }
        $misformulas = implode(',', $formulas);        
        return $misformulas;
    }
    
    public function datosTablaReg(){
        
        $valor = $_POST['listaIndicador'];                
        foreach ($valor as $value) {                            
            $a = explode(',', $value);
            //$ids[] = $a[0];
            //$nombreindi[] = $a[1];
            //$abrsector[] = $a[2];
            $indisec[] = array($a[1],$a[2],$a[4]);
            //$idsec[] = $a[3];
            $idsecindi[] = array($a[0],$a[3]);
            
        }        
        $datosComp = array('indisec'=>$indisec); 
        $this->session->set_userdata($datosComp);
     
        for ($i = 0; $i < count($idsecindi); $i++) {
            
        $formula = $this->cargarFomula($idsecindi[$i][0]);
        $idformula = $idsecindi[$i][0];
        $id_sectores = $idsecindi[$i][1];
	$parametro ="/<(.*?)>/";
	$rpta=1;
	$arreglo = "";
	while ($rpta != 0)
	{
            $rpta = preg_match($parametro,$formula ,$text);
            if($text != null)
            {
                    $formula = str_replace($text[0],'',$formula);	
                    $arreglo =  $arreglo . "'". $text[1] . "',";		
            }
	}
	$arreglo = "array[". $arreglo . "]";
	$arreglo =str_replace(",]","]",$arreglo);
        
        $query = $this->db->query("SELECT * FROM crosstab(
        $$ SELECT (c.nombre||' '||fi.sigla) as secind,date_part('year',e.fechadatoini)as fecha,geo.ejecutar_formula(c.formula,$arreglo,a.idrepterritorial,e.fechadatoini)
	FROM formindicador a, repterritorial b, formula c ,formvarterri e,indicador f, unidadmedida g, fuenteinformacion fi
	WHERE a.idrepterritorial = b.idrepterritorial	
	AND a.idformula = c.idformula
	AND a.idformindicador = e.idformindicador
	AND c.idformula = f.idformula
	AND f.idunidadmedida = g.idunidadmedida
	and b.idrepterritorial = a.idrepterritorial
	and fi.idfuenteinformacion = e.idfuenteinformacion	
        AND e.idfuenteinformacion = $id_sectores
	AND c.idformula = $idformula
	--AND b.idrepterritorial = 280	
	GROUP BY c.nombre,fi.sigla,e.fechadatoini,a.idformula,c.formula,a.idrepterritorial
	ORDER BY a.idformula,c.nombre $$,
	$$ SELECT c.anio:: CHARACTER VARYING AS periodo
 FROM generate_series(2005, 2015) AS c(anio) $$
)AS (nombre text, \"a2005\" FLOAT,\"a2006\" FLOAT,\"a2007\" FLOAT,\"a2008\" FLOAT,\"a2009\" FLOAT,\"a2010\" FLOAT,\"a2011\" FLOAT,\"a2012\" FLOAT, \"a2013\" FLOAT, \"a2014\" FLOAT, \"a2015\" FLOAT);");             
        
            $my_query[] = $query->result();            
        }        
        
        return $my_query;
    }
}
/* by facebook.com/ymamanic */