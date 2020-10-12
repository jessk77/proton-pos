<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta extends CI_Controller {

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
		
			$id=2;//$data["id"]; 
			$this->genmodel->edit_record($id,$data,"usuarios");
		

		$this->db->trans_complete();
		echo $this->db->trans_status();

	}

	public function change_pass(){
		$id=2;
		$user=$this->genmodel->get_record($id,"usuarios");
		$password_old=$this->input->post("password_old");
		$password=$this->input->post("password");
		if($password_old==$user->password){
			echo $this->genmodel->edit_record($id,array("password"=>$password),"usuarios");
		}
		else{
			echo 2;
		}
	}


    // VISTAS ====================================================================================================

	public function index()
	{
        $data["usuario"]=$this->genmodel->get_record(2,"usuarios");
		$this->load->view('header');
		$this->load->view('cuenta/cuenta',$data);
		$this->load->view('footer');
	}

	

    // OBTENCION DE REGISTROS PARA LISTADO ==============================================================================

	public function datatable_records(){
		$mes=$this->input->post("mes");
		$anio=$this->input->post("anio");

		$cond="estatus=1 AND YEAR(fecha)=$anio AND MONTH(fecha)=$mes";
		
        $gastos = $this->genmodel->get_records_condition($cond,"gastos");
        $json_data = array("data" => $gastos);
        echo json_encode($json_data);
	}

}
