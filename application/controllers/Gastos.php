<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        /*$logueo = $this->session->userdata('logeado');
        if($logueo!=1){
            redirect(base_url(), 'refresh');
        }*/
        
        $this->load->model('General_model', 'genmodel');
        //$this->load->model('Gastos_model', 'model');

    }


    public function submit(){
		$data=$this->input->post();

		$this->db->trans_start();
		if(!isset($data['id'])){ //insert
			$data["usuario_id"]=$this->session->userdata('proton_session')["id_master"];
			$id=$this->genmodel->add_record($data,"gastos");
		}
		else{ //update
			$id=$data["id"]; unset($data["id"]);
			$this->genmodel->edit_record($id,$data,"gastos");
		}

		$this->db->trans_complete();
		echo $this->db->trans_status();

	}


    // VISTAS ====================================================================================================

	public function index()
	{

		$this->load->view('header');
		$this->load->view('gastos/listado');
		$this->load->view('footer');
	}

	

    // OBTENCION DE REGISTROS PARA LISTADO ==============================================================================

	public function datatable_records(){
		$mes=$this->input->post("mes");
		$anio=$this->input->post("anio");

		$cond="estatus=1 AND YEAR(fecha)=$anio AND MONTH(fecha)=$mes AND usuario_id=".$this->session->userdata('proton_session')["id_master"];
		
        $gastos = $this->genmodel->get_records_condition($cond,"gastos");
        $json_data = array("data" => $gastos);
        echo json_encode($json_data);
	}

}
