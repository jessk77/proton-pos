<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        /*$logueo = $this->session->userdata('logeado');
        if($logueo!=1){
            redirect(base_url(), 'refresh');
        }*/
        
		$this->load->model('General_model', 'genmodel');
		$this->load->model("Productos_model",'model');
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('catalogos/productos/listado');
		$this->load->view('footer');
	}

	public function excel()
	{
		$this->load->view('header');
		$this->load->view('catalogos/productos/excel');
		$this->load->view('footer');
	}

	public function alta()
	{
		$data["categorias"]=$this->genmodel->get_records_condition("usuario_id=1","categorias");
		$this->load->view('header');
		$this->load->view('catalogos/productos/formulario',$data);
		$this->load->view('footer');
	}

	public function edicion($id_producto){
		$data["categorias"]=$this->genmodel->get_records_condition("usuario_id=1","categorias");
		$data['producto']=$this->genmodel->get_record($id_producto,"productos");
		$this->load->view('header');
		$this->load->view('catalogos/productos/formulario',$data);
		$this->load->view('footer');
	}

	public function etiquetas($id_producto){
		$data['producto']=$this->genmodel->get_record($id_producto,"productos");
		$this->load->view('header');
		$this->load->view('catalogos/productos/etiquetas',$data);
		$this->load->view('footer');
	}

	public function submit(){
		$data=$this->input->post();

		$this->db->trans_start();
		if(!isset($data['id'])){ //insert
			$data["usuario_id"]=$this->session->userdata('proton_session')["id_master"];
			$id=$this->genmodel->add_record($data,"productos");
		}
		else{ //update
			$id=$data["id"]; unset($data["id"]);
			$this->genmodel->edit_record($id,$data,"productos");
		}

		$this->db->trans_complete();
		echo $this->db->trans_status();

	}

	public function delete($id){
		$this->genmodel->edit_record($id,array("estatus"=>0),"productos");
	}

	public function datatable_records(){
		$params=$this->input->post();
        $productos = $this->model->getProductos($params);
        $totalRecords=$this->model->getNoProductos();

        $json_data = array(
            "draw"            => intval( $params['draw'] ),   
            "recordsTotal"    => intval( $totalRecords ),  
            "recordsFiltered" => intval($totalRecords),
            "data"            => $productos->result(),
            "query"           => $this->db->last_query()   
            );
        echo json_encode($json_data);
	}
}
