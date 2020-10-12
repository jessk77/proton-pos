<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        /*$logueo = $this->session->userdata('logeado');
        if($logueo!=1){
            redirect(base_url(), 'refresh');
        }*/
        
        $this->load->model('General_model', 'genmodel');
        $this->load->model('Productos_model', 'prodm');

    }


    // VISTAS ====================================================================================================

	public function index()
	{

		$this->load->view('header');
		$this->load->view('inventario/inventario');
		$this->load->view('footer');
	}

    public function getProducts($phrase){
        $productos = $this->prodm->searchProductos($phrase);
        $json_data = array("data" => $productos);
        echo json_encode($json_data);
    }

    public function agregar(){
        $id=$this->input->post("id");
        $cantidad=$this->input->post("cantidad")+$this->input->post("stock");
        $costo=$this->input->post("costo");

        $this->prodm->updateInventario($id,$cantidad,$costo);
        $this->genmodel->add_record(array("cantidad"=>$cantidad,"costo"=>$costo,"producto_id"=>$id,"tipo"=>"Agregar Inv"),"log_stock");

        echo 1;

    }

    public function ajustar(){
        $id=$this->input->post("id");
        $cantidad=$this->input->post("cantidad");

        $this->prodm->updateInventario2($id,$cantidad);
        $this->genmodel->add_record(array("cantidad"=>$cantidad,"producto_id"=>$id,"tipo"=>"Ajustar Inv"),"log_stock");

        echo 1;

    }
	

    // OBTENCION DE REGISTROS PARA LISTADO ==============================================================================

	public function datatable_inventario(){
        
		 $params=$this->input->post();

        $inventario = $this->prodm->getInventario($params);

        $totalRecords=$this->prodm->getTotalInventario();

        $json_data = array(
            "draw"            => intval( $params['draw'] ),   
            "recordsTotal"    => intval( $totalRecords ),  
            "recordsFiltered" => intval($totalRecords),
            "data"            => $inventario->result(),
            "query"           => $this->db->last_query()   
            );
        echo json_encode($json_data);
	}

}
