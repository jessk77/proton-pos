<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

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
		$this->load->view('catalogos/empleados/listado');
		$this->load->view('footer');
	}

	public function alta()
	{
		$this->load->view('header');
		$this->load->view('catalogos/empleados/formulario');
		$this->load->view('footer');
	}

	public function edicion($id_empleado){
		$data['empleado']=$this->genmodel->get_record($id_empleado,"empleados");
		$data['permisos']=$this->genmodel->get_records_condition("empleado_id=$id_empleado","permisos");
		$this->load->view('header');
		$this->load->view('catalogos/empleados/formulario',$data);
		$this->load->view('footer');
	}

	public function submit(){
		$data=$this->input->post();
		unset($data["password_again"]);
		if(isset($data['permisos'])){
			$permisos=$data["permisos"]; unset($data["permisos"]);
		}	

		$this->db->trans_start();
		if(!isset($data['id'])){ //insert
			$id=$this->genmodel->add_record($data,"usuarios");
		}
		else{ //update
			$id=$data["id"]; unset($data["id"]);
			$this->genmodel->edit_record($id,$data,"usuarios");
		}

		if(isset($permisos)){
			$this->genmodel->delete_records("empleado_id=$id","permisos");
			foreach ($permisos as $p) {
				$this->genmodel->add_record(array("empleado_id"=>$id,"submenu_id"=>$p),"permisos");
			}
		}
		

		$this->db->trans_complete();
		echo $this->db->trans_status();

	}

	public function delete($id){
		$this->genmodel->edit_record($id,array("estatus"=>0),"empleados");
	}

	public function datatable_records(){
		$empleados = $this->genmodel->get_table_active("empleados");
        $json_data = array("data" => $empleados);
        echo json_encode($json_data);
	}
}
