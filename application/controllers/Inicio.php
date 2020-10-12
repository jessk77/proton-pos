<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{

	public function index()
	{
		// 	$logueo = $this->session->userdata('proton_session')["logeado"];
		//   if($logueo!=1){
		//       $this->load->view('login');
		//   }
		//   else{
		$this->load->model('General_model', 'genmodel');
		$data["inventario"] = $this->genmodel->get_table("inventario");
		
		$this->load->model('Login_model', 'model');
		$data = array(
			'logeado' => true,
			'id_usuario' => 2,
			'usuario' => "Admin",
			'menu' => $this->get_menu(2),
			'id_master' => $this->model->getIdMaster(2)
		);

		//traer tipo plan o expiracion
		// padre (si padre 0 toma el id)
		$this->session->set_userdata(array("proton_session" => $data));

		$this->load->view('header');
		$this->load->view('welcome_message', $data);
		$this->load->view('footer');
		//   }

	}

	

	public function login()
	{

		$this->load->model('Login_model', 'model');

		$usuario = $this->input->post("usuario");

		$user = $this->model->login($usuario);


		$data = array(
			'logeado' => true,
			'id_usuario' => $user->id,
			'usuario' => $user->usuario,
			'menu' => $this->get_menu($user->id),
			'id_master' => $this->model->getIdMaster($user->id)
		);

		//traer tipo plan o expiracion
		// padre (si padre 0 toma el id)
		$this->session->set_userdata(array("proton_session" => $data));
		echo 1;
	}

	public function refresh()
	{
		$this->load->model('Login_model', 'model');

		$email = $this->input->post("email");

		$user = $this->model->refresh($email);


		$data = array(
			'logeado' => true,
			'id_usuario' => $user->id,
			'usuario' => $user->usuario,
			'menu' => $this->get_menu($user->id),
			'id_master' => $this->model->getIdMaster($user->id)
		);
		$this->session->set_userdata(array("proton_session" => $data));
		echo 1;
	}

	private function get_menu($id)
	{
		$this->load->model('Login_model', 'model');
		$menu = $this->model->menu($id);
		foreach ($menu as $m) {
			$m->submenu = $this->model->submenu($m->id, $id);
		}
		return $menu;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('logout');
	}
}
