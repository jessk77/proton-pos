<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        /*$logueo = $this->session->userdata('logeado');
        if($logueo!=1){
            redirect(base_url(), 'refresh');
        }*/
        
        $this->load->model('General_model', 'genmodel');
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('catalogos/clientes/listado');
		$this->load->view('footer');
	}

	public function alta()
	{
		$this->load->view('header');
		$this->load->view('catalogos/clientes/formulario');
		$this->load->view('footer');
	}

	public function edicion($id_cliente){
		$data['cliente']=$this->genmodel->get_record($id_cliente,"clientes");
		$this->load->view('header');
		$this->load->view('catalogos/clientes/formulario',$data);
		$this->load->view('footer');
	}

	public function submit(){
		$data=$this->input->post();

		$this->db->trans_start();
		if(!isset($data['id'])){ //insert
			$data["usuario_id"]=$this->session->userdata('proton_session')["id_master"];
			$id=$this->genmodel->add_record($data,"clientes");
		}
		else{ //update
			$id=$data["id"]; unset($data["id"]);
			$this->genmodel->edit_record($id,$data,"clientes");
		}

		$this->db->trans_complete();
		echo $this->db->trans_status();

	}

	public function delete($id){
		$this->genmodel->edit_record($id,array("estatus"=>0),"clientes");
	}

	public function datatable_records(){
		$id=$this->session->userdata('proton_session')["id_master"];
		$clientes = $this->genmodel->get_records_condition("estatus=1 AND usuario_id=$id ","clientes");
        $json_data = array("data" => $clientes);
        echo json_encode($json_data);
	}
}
