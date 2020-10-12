<?php
class Datos_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    
    }

    public function getVentasGeneral($fecha){
        $result=0;
        $str="SELECT count(1) as total FROM ventas WHERE fecha_creacion LIKE '$fecha%'";
        $query=$this->db->query($str);
        if(!empty($query->result())){
            $result=$query->row()->total;
        }
        return $result;
    }

    public function getTopProductos($month, $year){
        $str="SELECT count(producto_id)*cantidad as num, nombre 
        FROM ventas_detalle 
        INNER JOIN productos ON producto_id=productos.id 
        INNER JOIN ventas ON venta_id=ventas.id 
        WHERE MONTH(fecha_creacion)=$month AND YEAR(fecha_creacion)=$year  
        GROUP BY producto_id ORDER BY num desc LIMIT 0,6";

        $query=$this->db->query($str);
        $result=$query->result();
        return $result;

    }

    public function getEntradas($month, $year){
        $str="SELECT sum(total-descuento) as total FROM ventas WHERE MONTH(fecha_creacion)=$month AND YEAR(fecha_creacion)=$year";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }
    public function getSalidas($month, $year){
        $str="SELECT sum(monto) as total FROM gastos WHERE MONTH(fecha_creacion)=$month AND YEAR(fecha_creacion)=$year";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        $str="SELECT sum(costo) as total FROM log_stock WHERE MONTH(fecha)=$month AND YEAR(fecha)=$year AND tipo='Agregar Inv'";
        $query=$this->db->query($str);
        $result2=$query->row()->total;
        return $result+$result2;
    }

    // OBTENCION DE REGISTROS CORTE ==============================================================================


    public function getNoVentas($fecha){
        $str="SELECT COUNT(1) as total FROM ventas WHERE fecha_creacion LIKE '$fecha%'";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getTotalVentas($fecha){
        $str="SELECT SUM(total) as total FROM ventas WHERE fecha_creacion LIKE '$fecha%'";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getGanancias($fecha){
        $str="SELECT SUM(precio_venta-precio_compra) as total FROM ventas_detalle vd
        INNER JOIN ventas v ON v.id=venta_id INNER JOIN productos p ON vd.producto_id=p.id  WHERE fecha_creacion LIKE '$fecha%' AND v.estatus=1";
        $query=$this->db->query($str);
        $result=$query->row()->total;

        $str="SELECT SUM(descuento) as total FROM ventas v WHERE fecha_creacion LIKE '$fecha%' AND v.estatus=1";
        $query=$this->db->query($str);
        $result2=$query->row()->total; 
        return $result-$result2;
    }

    public function getTotalProductos($fecha){
        $str="SELECT SUM(cantidad) as total FROM ventas_detalle INNER JOIN ventas ON venta_id=ventas.id WHERE fecha_creacion LIKE '$fecha%'";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getCanceladas($fecha){
        $str="SELECT COUNT(1) as total FROM ventas WHERE fecha_creacion LIKE '$fecha%' AND estatus=0";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getTotalCanceladas($fecha){
        $str="SELECT SUM(total) as total FROM ventas WHERE fecha_creacion LIKE '$fecha%' AND estatus=0";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getNoGastos($fecha){
        $str="SELECT COUNT(1) as total FROM gastos WHERE fecha LIKE '$fecha' AND estatus=1";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getTotalGastos($fecha){
        $str="SELECT SUM(monto) as total FROM gastos WHERE fecha LIKE '$fecha' AND estatus=1";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getInventario(){
        $str="SELECT SUM(stock) as total FROM productos WHERE estatus=1";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getTotalInventario(){
        $str="SELECT SUM(stock*precio) as total FROM productos WHERE estatus=1";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getInventarioBajo(){
        $str="SELECT COUNT(1) as total FROM productos WHERE estatus=1 AND stock<stock_minimo";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    // OBTENCION DE REGISTROS VENTAS ==============================================================================


    public function getVentas($params){
        $columns = array( 
            0 => 'c.id',
            1 => 'razon_social',
            2 => 'total',
            3 => 'tipo_pago',
            4 => 'fecha_creacion',
            5 => 'usuarios.nombre',
            6=> 'motivo_cancelacion'
        );
        $select="c.id,c.fecha_creacion,tipo_pago,IFNULL(razon_social,'PUBLICO EN GENERAL') as razon_social,total as monto,c.estatus, usuarios.nombre as vendedor,motivo_cancelacion as motivo";
        $this->db->select($select);
        $this->db->from('ventas c');
        $this->db->join('clientes', 'c.cliente_id = clientes.id','left');
        $this->db->join('usuarios', 'c.usuario_id = usuarios.id','left');
        
        //si hay busqueda con el campo de busqueda
        if( !empty($params['search']['value']) ) {
            $search=$params['search']['value'];
            $this->db->group_start();
            foreach ($columns as $c) {
                $this->db->or_like($c,$search);
            }
            $this->db->group_end();
            
        }

        $this->db->where("c.fecha_creacion>=",$params["inicio"]." 00:00:00");
        $this->db->where("c.fecha_creacion<=",$params["fin"]." 23:59:59");
        $this->db->where("c.estatus",$params["estatus"]);
        
        $this->db->order_by($columns[$params['order'][0]['column']], $params['order'][0]['dir']);
        $this->db->limit($params['length'],$params['start']);
        
        $query=$this->db->get();
        return $query;
    }

    public function get_no_venta($params){
        $this->db->select('id');
        $this->db->from('ventas');
        $this->db->where("estatus",$params["estatus"]);
        return $this->db->count_all_results()+1;
    }

    public function getVentasRango($inicio,$fin,$estatus){
        $str="SELECT COUNT(1) as total FROM ventas WHERE fecha_creacion >='$inicio 00:00:00' AND fecha_creacion<='$fin 23:59:59' AND estatus=$estatus";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getTotalVentasRango($inicio,$fin,$estatus){
        $str="SELECT SUM(total) as total FROM ventas WHERE fecha_creacion >='$inicio 00:00:00' AND fecha_creacion<='$fin 23:59:59' AND estatus=$estatus";
        $query=$this->db->query($str);
        $result=$query->row()->total;
        return $result;
    }

    public function getGananciasRango($inicio,$fin,$estatus){
        $str="SELECT SUM(precio_venta-precio_compra) as total FROM ventas_detalle vd
        INNER JOIN ventas v ON v.id=venta_id INNER JOIN productos p ON vd.producto_id=p.id  WHERE fecha_creacion >='$inicio 00:00:00' AND fecha_creacion<='$fin 23:59:59' AND v.estatus=$estatus";
        $query=$this->db->query($str);
        $result=$query->row()->total;

        $str="SELECT SUM(descuento) as total FROM ventas v WHERE fecha_creacion >='$inicio 00:00:00' AND fecha_creacion<='$fin 23:59:59' AND v.estatus=$estatus";
        $query=$this->db->query($str);
        $result2=$query->row()->total;

        return $result-$result2;
    }

    public function getEmpleados($inicio,$fin){
        $sub="SELECT COUNT(1) FROM ventas WHERE fecha_creacion >='$inicio 00:00:00' AND fecha_creacion<='$fin 23:59:59' AND estatus=1 AND usuario_id=usuarios.id";
        $str="SELECT nombre ,($sub) as ventas FROM usuarios ";
        $query=$this->db->query($str);
        return $query->result();
    }

    //REGISTROS DE INVENTARIO

    public function getDataInventario($params){
        $columns = array( 
            0 => 'codigo',
            1 => 'p.nombre',
            2 => 'c.nombre',
            3 => 'precio',
            4 => 'stock',
            5 => 'stock_minimo',
            6=> 'stock_maximo',
            7=> '(stock_minimo-stock)'
        );
        $select="codigo,p.nombre as producto,c.nombre as categoria,precio,stock,stock_minimo,stock_maximo";
        $this->db->select($select);
        $this->db->from('productos p');
        $this->db->join('categorias c', 'categoria = c.id','left');
        
        //si hay busqueda con el campo de busqueda
        if( !empty($params['search']['value']) ) {
            $search=$params['search']['value'];
            $this->db->group_start();
            foreach ($columns as $c) {
                $this->db->or_like($c,$search);
            }
            $this->db->group_end();
            
        }

        
        $this->db->where("p.estatus",1);
        
        $this->db->order_by($columns[$params['order'][0]['column']], $params['order'][0]['dir']);
        $this->db->limit($params['length'],$params['start']);
        
        $query=$this->db->get();
        return $query;
    }

    public function get_no_dataInv($params){
        $this->db->select('id');
        $this->db->from('productos p');
        $this->db->join('categorias c', 'categoria = c.id','left');
        $this->db->where("p.estatus",1);
        return $this->db->count_all_results()+1;
    }
    

}