<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajustes extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        /*$logueo = $this->session->userdata('logeado');
        if($logueo!=1){
            redirect(base_url(), 'refresh');
        }*/
        
        $this->load->model('General_model', 'genmodel');

    }


    // VISTAS ====================================================================================================

	public function index()
	{
        $id_usr=1;
        $data["empresa"]=$this->genmodel->get_records_condition("usuario_id=$id_usr","empresas")[0];
		$this->load->view('header');
		$this->load->view('ajustes/ajustes',$data);
		$this->load->view('footer');
    }

    //EMPRESA ==================================================================================================

    public function submit_empresa(){
        $data=$this->input->post();
        $id_usr=1;

        if(isset($_FILES["logotipo"])){
            $name=explode("/",$_FILES["logotipo"]["type"]);
            $nameFoto="empresa_1.".$name[1];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            //$config['max_width'] = 1024;
            //$config['max_height'] = 768;
            $config['file_name'] = "empresa_1";
            $config['overwrite'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("logotipo")) {
                $this->upload->data();
//                 $path = './uploads/'.$nameFoto;
// $type = pathinfo($path, PATHINFO_EXTENSION);
// $data = file_get_contents($path);
// $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// echo $base64; die;
            }
            else{
                $msg=$this->upload->display_errors('', ''); echo $msg; die;
            }
            $data['logotipo'] = $nameFoto;

        }

        $this->genmodel->edit_record($id_usr,$data,"empresas");

    }

    //CATEGORIAS ================================================================================================

    public function submit_categorias(){
        $data=$this->input->post();

		$this->db->trans_start();
        if($data['id']==0){ //insert
            unset($data["id"]);
			$id=$this->genmodel->add_record($data,"categorias");
		}
		else{ //update
			$id=$data["id"]; unset($data["id"]);
			$this->genmodel->edit_record($id,$data,"categorias");
		}

		$this->db->trans_complete();
		echo $this->db->trans_status();
    }

    public function delete_categoria($id){
        $this->genmodel->edit_record($id,array("estatus"=>0),"categorias");
    }
    

    public function datatable_records($table){
        $result = $this->genmodel->get_table_active($table);
        $json_data = array("data" => $result);
        echo json_encode($json_data);
    }
}