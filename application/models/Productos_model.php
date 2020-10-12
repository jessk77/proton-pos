<?php
class Productos_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    
    }

    public function searchProductos($phrase){
        $str="SELECT id,nombre,codigo,stock FROM productos WHERE nombre like '%$phrase%' OR codigo like '%$phrase%'
         AND usuario_id=".$this->session->userdata('proton_session')["id_master"];
        $query=$this->db->query($str);
        return $query->result();
    }

    public function getProductos($params){
        $columns = array( 
            0 => 'nombre',
            1 => 'categoria',
            2 => 'stock',
            3 => 'unidades',
            4 => 'precio_compra',
            5 => 'precio'
        );
        $select="p.id,p.nombre,c.nombre as categoria,stock,unidad,precio_compra,precio";
        $this->db->select($select);
        $this->db->from('productos p');
        $this->db->join('categorias c', 'c.id = p.categoria', 'left');
        
        //si hay busqueda con el campo de busqueda
        if( !empty($params['search']['value']) ) {
            $search=$params['search']['value'];
            $this->db->group_start();
            foreach ($columns as $c) {
                $this->db->or_like($c,$search);
            }
            $this->db->group_end();
            
        }
        $this->db->where('p.usuario_id',$this->session->userdata('proton_session')["id_master"]);
        
        $this->db->order_by($columns[$params['order'][0]['column']], $params['order'][0]['dir']);
        $this->db->limit($params['length'],$params['start']);
        
        $query=$this->db->get();
        return $query;
    }

    public function getNoProductos(){
        $select="count(1) as total";
        $this->db->select($select);
        $this->db->from('productos p');
        $this->db->join('categorias c', 'c.id = p.categoria', 'left');
        $this->db->where('p.usuario_id',$this->session->userdata('proton_session')["id_master"]);
        
        $query=$this->db->get();
        return $query->row()->total;
    }

    public function updateInventario($id,$cantidad,$costo){
        $this->db->set(array("stock"=>$cantidad,"precio_compra"=>$costo));
        $this->db->where("id",$id);
        return $this->db->update("productos");
    }

    public function updateInventario2($id,$cantidad){
        $this->db->set(array("stock"=>$cantidad));
        $this->db->where("id",$id);
        return $this->db->update("productos");
    }

    public function getInventario($params){
        $columns = array( 
            0 => 'p.codigo',
            1 => 'p.nombre',
            2 => 'c.nombre',
            3 => 'stock',
            4 => 'stock_minimo',
            5 => 'stock_maximo',
        );
        $select="p.id,p.codigo,p.nombre,c.nombre as categoria,stock,stock_minimo,stock_maximo";
        $this->db->select($select);
        $this->db->from('productos p');
        $this->db->join('categorias c', 'c.id = p.categoria', 'left');
        
        //si hay busqueda con el campo de busqueda
        if( !empty($params['search']['value']) ) {
            $search=$params['search']['value'];
            $this->db->group_start();
            foreach ($columns as $c) {
                $this->db->or_like($c,$search);
            }
            $this->db->group_end();
        }
        $this->db->where('p.usuario_id',$this->session->userdata('proton_session')["id_master"]);
        $this->db->order_by($columns[$params['order'][0]['column']], $params['order'][0]['dir']);
        $this->db->limit($params['length'],$params['start']);
        
        $query=$this->db->get();
        return $query;
    }

   
    public function getTotalInventario(){
        $select="count(1) as total";
        $this->db->select($select);
        $this->db->from('productos p');
        $this->db->join('categorias c', 'c.id = p.categoria', 'left');
        $this->db->where('p.usuario_id',$this->session->userdata('proton_session')["id_master"]);
        
        $query=$this->db->get();
        return $query->row()->total;
    }
    

}