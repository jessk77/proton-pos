<?php
class Ventas_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getVentas($params){
        $columns = array( 
            0 => 'c.id',
            1 => 'razon_social',
            2 => 'total',
            3 => 'tipo_pago',
            4 => 'fecha_creacion'
        );
        $select="c.id,fecha_creacion,tipo_pago,IFNULL(razon_social,'PUBLICO EN GENERAL') as razon_social,total as monto,c.estatus";
        $this->db->select($select);
        $this->db->from('ventas c');
        $this->db->join('ventas_detalle', 'c.id = venta_id');
        $this->db->join('clientes', 'c.cliente_id = clientes.id','left');
        
        //si hay busqueda con el campo de busqueda
        if( !empty($params['search']['value']) ) {
            $search=$params['search']['value'];
            $this->db->group_start();
            foreach ($columns as $c) {
                $this->db->or_like($c,$search);
            }
            $this->db->group_end();
            
        }
        $this->db->where('c.usuario_id',$this->session->userdata('proton_session')["id_master"]);
        
        $this->db->order_by($columns[$params['order'][0]['column']], $params['order'][0]['dir']);
        $this->db->limit($params['length'],$params['start']);
        
        $query=$this->db->get();
        return $query;
    }

    public function getNoVentas(){
        $select="count(1) as total";
        $this->db->select($select);
        $this->db->from('ventas c');
        $this->db->join('ventas_detalle', 'c.id = venta_id');
        $this->db->join('clientes', 'c.cliente_id = clientes.id','left');
        $this->db->where('c.usuario_id',$this->session->userdata('proton_session')["id_master"]);
        
        $query=$this->db->get();
        return $query->row()->total;
    }


    

    public function update_stock($id,$cantidad){
        $sql = "UPDATE productos SET stock=stock-$cantidad WHERE id=$id";
        return $this->db->query($sql);
        
    }

    public function get_no_venta(){
        $this->db->select('id');
        $this->db->from('ventas');
        return $this->db->count_all_results()+1;
    }




}