<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formatos extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        /*$logueo = $this->session->userdata('logeado');
        if($logueo!=1){
            redirect(base_url(), 'refresh');
        }*/
        
        $this->load->model('Formatos_model', 'model');
        $this->load->model('General_model', 'genmodel');
    }


	public function ticketmateria($id){
        //$data['venta'] = array();
        if($id!=0){
            $data["venta"]=$this->genmodel->get_record($id,"ventas");
            $data["detalle"]=$this->model->get_detalle($id);
        }
        else{
            $data["venta"]=(object)  array("fecha_creacion"=>date("Y-m-d"),"alias"=>"Publico en General","total"=>100,"descuento"=>0);
            $data["detalle"]=(object) array((object) array("cantidad"=>5,"nombre"=>"Producto Prueba","precio_venta"=>20));
        }
        
        $data['empresa']=$this->genmodel->get_record(1,"empresas");
       // $this->load->view('formatos/ticket'); 
        $this->printPDF("Ticket de Compra", 'ticket', $data);
	}


    public function printPDF($name, $file, $data) {

        $this->load->library('Pdf');
        
        $width = 72;  
        $height = 297; 
        $pageLayout = array($width, $height);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageLayout, TRUE, 'UTF-8', FALSE);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Puebla Express');
        $pdf->SetTitle($name);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(5, 5, 5, true);

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
        
        

        $html = $this->load->view('formatos/' . $file, $data, true);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->lastPage();
        $pdf->Output($name . '.pdf', 'I');
    }

}
