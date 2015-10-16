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
        
        if(isset($_POST['listaSector'])){
            $datosForm = $this->input->post();//recuperando datos del formulario para mostrar indicadores
            //cargar lista de sectores seleccionados
            $valor = $_POST['listaSector'];            
            $lista = array();            
            foreach ($valor as $value) {
                $lista[] = $value;                
            }
            $ids = implode(',', $lista);        //concatenando id de cada sector            
            //recuperando datos de provincia
            $provincia = $datosForm['provincia'];           
            // recuperando fecha inicial
            $fi_dia = $datosForm['fi_dia'];
            $fi_mes = $datosForm['fi_mes'];
            $fi_anio = $datosForm['fi_anio'];
            $fechaInicial = $fi_anio.'-'.$fi_mes.'-'.$fi_dia;
            // recuperando fecha final
            $ff_dia = $datosForm['ff_dia'];
            $ff_mes = $datosForm['ff_mes'];
            $ff_anio = $datosForm['ff_anio'];
            $fechaFinal = $ff_anio.'-'.$ff_mes.'-'.$ff_dia;
            
            //recuperando id de select distrito
            if($_POST['distrito']!=NULL && $_POST['provincia']!='030000'){
                $distrito = $datosForm['distrito'];//condició para verificar nivel provincia y distrito

                $query = $this->db->query("SELECT A .idformindicador,b.idrepterritorial,b.nombre as localidad,b.codigo,C .nombre as nombreindicador,fi.sigla as abrsector,e.idfuenteinformacion,fi.nombre,G .sigla,date_part('year', e.fechadatoini) :: CHARACTER VARYING AS periodo
            FROM
            formindicador A,repterritorial b,formula C,formvarterri e,indicador f,unidadmedida G,fuenteinformacion fi
            WHERE
            A .idrepterritorial = b.idrepterritorial
            AND A .idformula = C .idformula
            AND A .idformindicador = e.idformindicador
            AND C .idformula = f.idformula
            AND f.idunidadmedida = G .idunidadmedida
            AND b.idrepterritorial = A .idrepterritorial
            AND fi.idfuenteinformacion = e.idfuenteinformacion
            AND fi.idfuenteinformacion IN ($ids)
            AND b.idrepterritorial IN ($provincia,$distrito)
            AND e.fechadatoini BETWEEN '$fechaInicial' AND '$fechaFinal'
            GROUP BY 	fi.nombre,	A .idformindicador,	b.idrepterritorial,	b.nombre,	b.codigo,	C .nombre,fi.sigla,	e.idfuenteinformacion,	C .formula,
            A .idrepterritorial,	e.idfuenteinformacion,	e.idmetodocaptura,	G .sigla,	e.fechadatoini
            ORDER BY A.idformindicador;");                      
                return $query->result();
            }else{
                    $query = $this->db->query("SELECT A .idformindicador,b.idrepterritorial,b.nombre as localidad,b.codigo,C .nombre as nombreindicador,fi.sigla as abrsector,e.idfuenteinformacion,fi.nombre,G .sigla,date_part('year', e.fechadatoini) :: CHARACTER VARYING AS periodo
            FROM
            formindicador A,repterritorial b,formula C,formvarterri e,indicador f,unidadmedida G,fuenteinformacion fi
            WHERE
            A .idrepterritorial = b.idrepterritorial
            AND A .idformula = C .idformula
            AND A .idformindicador = e.idformindicador
            AND C .idformula = f.idformula
            AND f.idunidadmedida = G .idunidadmedida
            AND b.idrepterritorial = A .idrepterritorial
            AND fi.idfuenteinformacion = e.idfuenteinformacion
            AND fi.idfuenteinformacion IN ($ids)
            AND b.codigo = '030000'
            AND e.fechadatoini BETWEEN '$fechaInicial' AND '$fechaFinal'
            GROUP BY 	fi.nombre,	A .idformindicador,	b.idrepterritorial,	b.nombre,	b.codigo,	C .nombre,fi.sigla,	e.idfuenteinformacion,	C .formula,
            A .idrepterritorial,	e.idfuenteinformacion,	e.idmetodocaptura,	G .sigla,	e.fechadatoini
            ORDER BY A.idformindicador;");                      
                return $query->result();
            }
        }else{
            return FALSE;
        }        
    }
    public function lisDisxPro($idpadre){
        $this->db->where('idpadre',$idpadre);
        $distritos = $this->db->get('repterritorial');
        if($distritos->num_rows()>0){
            return $distritos->result();
        }
    }
}