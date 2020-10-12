<?php
class Compras_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function comprasInsumos($params){
        $columns = array( 
            0 => 'c.id',
            1 => 'fecha_creacion', 
            2 => 'alias',
            3 => 'cantidad',
            4 => 'unidad',
            5 => 'nombre',
            6 => 'compras_detalle.precio_compra',
            7 => '(precio_compra*cantidad)'
        );
        $select="c.id,fecha_creacion,alias,cantidad,nombre,compras_detalle.precio_compra,unidad";
        $select.=", FORMAT(compras_detalle.precio_compra*cantidad,2) as total";
        $this->db->select($select);
        $this->db->from('compras c');
        $this->db->join('compras_detalle', 'c.id = compra_id');
        $this->db->join('proveedores', 'c.proveedor_id = proveedores.id');
        $this->db->join('productos', 'producto_id = productos.id');
        
        //si hay busqueda con el campo de busqueda
        if( !empty($params['search']['value']) ) {
            $search=$params['search']['value'];
            $this->db->group_start();
            foreach ($columns as $c) {
                $this->db->or_like($c,$search);
            }
            $this->db->group_end();
            
        }
        
        $this->db->order_by($columns[$params['order'][0]['column']], $params['order'][0]['dir']);
        $this->db->limit($params['length'],$params['start']);
        
        $query=$this->db->get();
        return $query;
    }

    public function totalInsumos(){
        $this->db->select("COUNT(1) as total");
        $this->db->from('compras c');
        $this->db->join('compras_detalle', 'c.id = compra_id');
        $this->db->join('proveedores', 'c.proveedor_id = proveedores.id');
        $this->db->join('productos', 'producto_id = productos.id');
        $query=$this->db->get();
        return $query->row()->total;
    }

    public function comprasMaterias($params){
        $columns = array( 
            0 => 'c.id',
            1 => 'fecha', 
            2 => 'alias',
            3 => 'peso',
            5 => 'nombre',
            6 => 'precio_compra',
            7 => '(precio_compra*peso)'
        );
        $select="c.id,fecha,alias,peso,nombre,precio_compra,";
        $select.=", FORMAT(precio_compra*peso,2) as total";
        $this->db->select($select);
        $this->db->from('compras_mp_detalle c');
        $this->db->join('proveedores', 'c.proveedor_id = proveedores.id');
        $this->db->join('inventario', 'materia_id = inventario.id');
        
        //si hay busqueda con el campo de busqueda
        if( !empty($params['search']['value']) ) {
            $search=$params['search']['value'];
            $this->db->group_start();
            foreach ($columns as $c) {
                $this->db->or_like($c,$search);
            }
            $this->db->group_end();
            
        }
        
        $this->db->order_by($columns[$params['order'][0]['column']], $params['order'][0]['dir']);
        $this->db->limit($params['length'],$params['start']);
        
        $query=$this->db->get();
        return $query;
    }

    public function totalMaterias(){
        $this->db->select("COUNT(1) as total");
       $this->db->from('compras_mp_detalle c');
        $this->db->join('proveedores', 'c.proveedor_id = proveedores.id');
        $this->db->join('inventario', 'materia_id = inventario.id');
        $query=$this->db->get();
        return $query->row()->total;
    }

    public function update_stock($id,$cantidad){
        $sql = "UPDATE productos SET stock=stock+$cantidad WHERE id=$id";
        return $this->db->query($sql);
        
    }

    public function update_stockMP($id,$cantidad){
        $sql = "UPDATE inventario SET stock=stock+$cantidad WHERE id=$id";
        return $this->db->query($sql);
    }




}