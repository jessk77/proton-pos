<?php
class Formatos_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getCompra_mp($id){
        $sql = "SELECT compras_mp_detalle.*,proveedores.alias,productos.nombre FROM compras_mp_detalle 
        INNER JOIN proveedores ON proveedor_id=proveedores.id
        INNER JOIN productos ON materia_id=productos.id 
        WHERE compras_mp_detalle.id=$id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function get_detalle($id){
        $sql="SELECT vd.*, productos.nombre FROM ventas_detalle vd INNER JOIN productos ON vd.producto_id=productos.id WHERE vd.venta_id=$id"; 
        $query = $this->db->query($sql);
        return $query->result();
    }




}