<?php
class Login_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function login($usuario){
        $this->db->where("usuario",$usuario);
    	$query=$this->db->get("usuarios");
        return $query->row();
    }

    public function refresh($email){
        $this->db->where("correo",$email);
    	$query=$this->db->get("usuarios");
        return $query->row();
    }

    public function menu($id_empleado){
        $sql="SELECT menu.* FROM menu INNER JOIN sub_menu ON menu.id=menu_id INNER JOIN permisos ON sub_menu.id=submenu_id WHERE empleado_id=$id_empleado GROUP BY menu.id";
        $query=$this->db->query($sql);
        return $query->result();
    }

    public function submenu($id_menu,$id_empleado){
        $sql="SELECT sub_menu.* FROM sub_menu INNER JOIN permisos ON sub_menu.id=submenu_id WHERE empleado_id=$id_empleado AND menu_id=$id_menu";
        $query=$this->db->query($sql);
        return $query->result();
    }

    public function getIdMaster($id_empleado){
        $sql="SELECT IF(usuario_padre=0,id,usuario_padre) as id FROM usuarios WHERE id=$id_empleado";
        $query=$this->db->query($sql);
        return $query->row()->id;
    }


}