<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        /*$logueo = $this->session->userdata('logeado');
        if($logueo!=1){
            redirect(base_url(), 'refresh');
        }*/

        $this->load->model('General_model', 'genmodel');
        $this->load->model('Datos_model', 'model');
    }




    // VISTAS ====================================================================================================

    public function index()
    {

        $this->load->view('header');
        $this->load->view('datos/datos');
        $this->load->view('footer');
    }

    public function corte()
    {
        $this->load->view('header');
        $this->load->view('datos/corte');
        $this->load->view('footer');
    }

    public function ventas()
    {
        $this->load->view('header');
        $this->load->view('datos/ventas');
        $this->load->view('footer');
    }

    public function ventas_categoria()
    {
        $this->load->view('header');
        $this->load->view('datos/ventas_categoria');
        $this->load->view('footer');
    }

    public function ventas_empleado()
    {
        $this->load->view('header');
        $this->load->view('datos/ventas_empleado');
        $this->load->view('footer');
    }

    public function ventas_canceladas()
    {
        $this->load->view('header');
        $this->load->view('datos/ventas_canceladas');
        $this->load->view('footer');
    }

    public function inventario()
    {
        $this->load->view('header');
        $this->load->view('datos/inventario');
        $this->load->view('footer');
    }

    public function movimientos()
    {
        $this->load->view('header');
        $this->load->view('datos/movimientos');
        $this->load->view('footer');
    }



    // OBTENCION DE REGISTROS GENERAL ==============================================================================

    public function ventas_general($month, $year)
    {
        $numero = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $result = [];
        for ($i = 1; $i < $numero + 1; $i++) {
            $fecha = date("Y-m-d", strtotime("$year-$month-$i"));
            array_push($result, $this->model->getVentasGeneral($fecha));
        }
        echo json_encode($result);
    }

    public function top_productos($month, $year)
    {
        $result = "";
        $productos = $this->model->getTopProductos($month, $year);
        $i = 1;
        foreach ($productos as $p) {
            $result .= "<tr><td>$i</td><td>$p->nombre</td></tr>";
            $i++;
        }
        echo $result;
    }

    public function get_entradas_salidas($month, $year)
    {
        $data["entradas"] = $this->model->getEntradas($month, $year);
        $data["salidas"] = $this->model->getSalidas($month, $year);

        echo json_encode($data);
    }

    // OBTENCION DE REGISTROS CORTE ==============================================================================

    public function get_corte()
    {
        $fecha = $this->input->post("fecha");
        $result = array(
            "no_ventas" => $this->model->getNoVentas($fecha),
            "total_ventas" => $this->model->getTotalVentas($fecha),
            "ganancias" => $this->model->getGanancias($fecha),
            "productos" => $this->model->getTotalProductos($fecha),
            "canceladas" => $this->model->getCanceladas($fecha),
            "total_canceladas" => $this->model->getTotalCanceladas($fecha),
            "no_gastos" => $this->model->getNoGastos($fecha),
            "total_gastos" => $this->model->getTotalGastos($fecha),
            "inventario" => $this->model->getInventario(),
            "total_inventario" => $this->model->getTotalInventario(),
            "bajos_stock" => $this->model->getInventarioBajo()

        );
        echo json_encode($result);
    }

    // OBTENCION DE REGISTROS VENTAS ==============================================================================

    public function datatable_ventas()
    {

        $params = $this->input->post();

        $ventas = $this->model->getVentas($params);

        $totalRecords = $this->model->get_no_venta($params);

        $json_data = array(
            "draw"            => intval($params['draw']),
            "recordsTotal"    => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $ventas->result(),
            "no_ventas"      => $this->model->getVentasRango($params["inicio"], $params["fin"], $params["estatus"]),
            "total_ventas"   => "$".$this->model->getTotalVentasRango($params["inicio"], $params["fin"], $params["estatus"]),
            "ganancias"      => "$".$this->model->getGananciasRango($params["inicio"], $params["fin"], $params["estatus"])
        );
        echo json_encode($json_data);
    }

    public function ventas_empleados()
    {
        $inicio = $this->input->post("inicio");
        $fin = $this->input->post("fin");
        $data = $this->model->getEmpleados($inicio, $fin);
        $empleados = array();
        $valores = array();
        foreach ($data as $d) {
            array_push($empleados, $d->nombre);
            array_push($valores, $d->ventas);
        }

        echo json_encode(array("labels" => $empleados, "values" => $valores));
    }

    public function datatable_inventario()
    {
        $params = $this->input->post();

        $inventario = $this->model->getDataInventario($params);

        $totalRecords = $this->model->get_no_dataInv($params);

        $json_data = array(
            "draw"            => intval($params['draw']),
            "recordsTotal"    => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $inventario->result(),
            "no_productos"      => $totalRecords,
            "stock"   => $this->model->getInventario(),
            "valor"      => $this->model->getTotalInventario()
        );
        echo json_encode($json_data);
    }
}
