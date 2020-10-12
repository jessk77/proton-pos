<?php
class General_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_table($table){
    	$sql = "SELECT * FROM $table";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_table_active($table){
    	$sql = "SELECT * FROM $table WHERE estatus=1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_record($id,$table){
    	$sql = "SELECT * FROM $table WHERE id=$id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function get_records_condition($condition,$table){
    	$sql = "SELECT * FROM $table WHERE $condition";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function add_record($data,$table){
    	$this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function edit_record($id,$data,$table){
    	$this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update($table);
    }

    public function delete_records($condition,$table){
    	$sql = "DELETE FROM $table WHERE $condition";
        $query = $this->db->query($sql);
        return $query;
    }

    public function SimpleGet($valor,$campo,$tabla,$cont){
        $this->db->select($cont);
        $this->db->where($campo,$valor);
        return $this->db->get($tabla)->row()->$cont;
    }




}