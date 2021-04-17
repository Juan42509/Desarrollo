<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){

		$this->load->model("HomeModel");
		
		$area = $this->HomeModel->showArea();
		$rol = $this->HomeModel->ShowRol();
		
		$data = array(
			'area' => $area,
			'roles' => $rol
		);

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$usuario = $this->HomeModel->showEmpleado($id);
			$data['user'] = $usuario[0];
		}

		$this->load->view('index',$data);
	}

	public function save(){
		if(isset($_POST)){
			$datos = array(
				'nombre' => $_POST['nombre_completo'],
				'email' => $_POST['email'],
				'sexo' => $_POST['sexo'],
				'area_id' => $_POST['area'],
				'boletin' => $_POST['boletin'] ? $_POST['boletin'] : 0,
				'descripcion' => $_POST['descripcion']
			);

			$this->load->model("HomeModel");
			$this->HomeModel->insertEmpleados($datos);
			$this->HomeModel->insertEmpleadoRol();
		}

		return redirect(base_url());
	}

	public function Usuarios(){

		$this->load->model("HomeModel");

		
		$area = $this->HomeModel->showEmpleadosALL();

		
		$data = array(
			'users' => $area->result_object
		);

		return $this->load->view('usuarios',$data);
	}

	public function edit(){
		if(isset($_POST)){
			$this->load->model("HomeModel");

			$data = array(
				'id' => $_POST['id'],
				'nombre' => $_POST['nombre_completo'],
				'email' => $_POST['email'],
				'sexo' => $_POST['sexo'],
				'area_id' => $_POST['area'],
				'boletin' =>$_POST['boletin'],
				'descripcion' => $_POST['descripcion'],
			);

			$this->HomeModel->update($data);
			$this->HomeModel->insertEmpleadoRol();
		}

		return redirect(base_url().'index.php/home/usuarios');
	}

	public function delete(){
		if(isset($_GET['id'])){
			$this->load->model("HomeModel");

			$id = $_GET['id'];

			$this->HomeModel->deleted($id);
		}

		return redirect(base_url().'index.php/home/usuarios');
	}
}
