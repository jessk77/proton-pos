<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        /*$logueo = $this->session->userdata('logeado');
        if($logueo!=1){
            redirect(base_url(), 'refresh');
        }*/
        
        $this->load->model('General_model', 'genmodel');
        $this->load->model('Ventas_model', 'model');

    }


    // VISTAS ====================================================================================================

	public function index()
	{
        $data["clientes"]=$this->genmodel->get_table_active("clientes");
        $data["productos"]=$this->genmodel->get_records_condition("estatus=1 ","productos");
        $data["no_venta"]=$this->model->get_no_venta();
        $data["empresa"]=$this->genmodel->get_records_condition("usuario_id=1 ","empresas")[0];
        $this->load->view('header');
        $this->load->view('ventas/addVenta',$data);
        $this->load->view('footer');
	}

    public function listado(){
        $this->load->view('header');
		$this->load->view('ventas/listado');
        $this->load->view('footer');
    }

    // OPERACION ====================================================================================================

    public function realizar_venta(){
        $data=$this->input->post();
        $ventas=$this->session->userdata('ventas');
        $data["usuario_id"]=$this->session->userdata('proton_session')["id_master"];
        $id_venta=$this->genmodel->add_record($data,"ventas");
        foreach($ventas as &$c){
                $record=array
                (
                    "cantidad"=>$c["cantidad"],
                    "producto_id"=>$c["id"],
                    "precio_venta"=>$c["precio"],
                    "venta_id"=>$id_venta
                );
                $this->genmodel->add_record($record,"ventas_detalle");
                $this->model->update_stock($c["id"],$c["cantidad"]);
            }
        echo $id_venta;
    }

    public function add_element(){
        $codigo=$this->input->post("producto");
        $cantidad=$this->input->post("cantidad");
        
        $ventas=$this->session->userdata('ventas');
        if($ventas==null){
            $ventas=array();
        }
        
        $query=$this->db->get_where('productos', array('codigo' => $codigo));

        if($query->num_rows()>0){
            $producto=$query->row();
            $coincidencia=0; $total=0;
            $data["tabla"]="";
            foreach($ventas as &$c){
                if($c["id"]==$producto->id){
                    $c["cantidad"]+=$cantidad;
                    //$c->precio+=$cantidad;
                    $coincidencia=1;
                }
                $data["tabla"].=$this->row_elements($c["codigo"],$c["nombre"],$c["cantidad"],$c["precio"]);
                $total+=$c["cantidad"]*$c["precio"];
            }
            if($coincidencia==0){
                array_push($ventas,array("id"=>$producto->id,
                    "codigo"=>$codigo,
                    "nombre"=>$producto->nombre,
                    "cantidad"=>$cantidad, 
                    "precio"=>$producto->precio));
                $data["tabla"].=$this->row_elements($codigo,$producto->nombre,$cantidad,$producto->precio);
               
                $total+=$cantidad*$producto->precio;
            }
            
            $data["total"]=number_format($total,2);
            $this->session->set_userdata('ventas',$ventas);
            $data["resultado"]="OK";
            
        }
        else{
            $data["resultado"]="El código de producto ingresado no existe";
        }
        echo json_encode($data);
    }

    public function delete_element(){
        $fila=$this->input->post("row");
        $ventas=$this->session->userdata('ventas');
        unset($ventas[$fila]);
        $result="";
        foreach($ventas as &$c){
                $result.=$this->row_elements($c["codigo"],$c["nombre"],$c["cantidad"],$c["precio"]);
            }
        $this->session->set_userdata('ventas',$ventas);
        echo $result;
    }

    private function row_elements($codigo,$nombre,$cantidad,$precio){
        return "<tr>"
                        . "<td>$codigo</td>"
                        . "<td>$nombre</td>"
                        . "<td>".number_format($precio,2)."</td>"
                        . "<td>$cantidad</td>"
                        . "<td>".number_format($precio*$cantidad,2)."</td>"
                        . "<td>
                    <button type='button' onclick='delete_element($(this))' class='btn btn-xs waves-effect btn-danger delete'><i class='material-icons'>cancel</i></button></td>"
                        . "</tr>";
    }

    
    public function clear_elements(){
        $ventas=array();
        $this->session->set_userdata('ventas',$ventas);
    }

    public function cancelar_venta($id){
        echo $this->genmodel->edit_record($id,$this->input->post(),"ventas");
    }



    // OBTENCION DE REGISTROS PARA LISTADO ==============================================================================


    public function datatable_ventas(){
        
         $params=$this->input->post();

        $ventas = $this->model->getVentas($params);

        $totalRecords=$this->model->getNoVentas();

        $json_data = array(
            "draw"            => intval( $params['draw'] ),   
            "recordsTotal"    => intval( $totalRecords ),  
            "recordsFiltered" => intval($ventas->num_rows()),
            "data"            => $ventas->result(),
            "query"           => $this->db->last_query()   
            );
        echo json_encode($json_data);
    }
}

