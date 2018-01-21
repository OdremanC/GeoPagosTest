<?php


/**
* GET,POST,PUT y DELETE de Usuarios
*/
class Usuario extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Usuario');
	}

	public function index(){
		$data['contenido'] = "usuario/index";
		$data['listaDeUsuarios'] = $this->Model_Usuario->listUsuarios();
		$this->load->view('plantilla',$data);
	}

	public function insert(){
		$datos = $this->input->post();
		$nombre = $datos['nombre'];
		$edad = $datos['edad'];
		$clave = $datos['clave'];

		if (!empty($nombre) && strlen($nombre) > 2) {
			if($edad >= 18 && $edad !== '') {
				$this->Model_Usuario->insertUsuarios($nombre,$edad,$clave);
				redirect('');			
			}else{
				redirect('');
			}
		}else{
				redirect('');
			}

	}

	public function deleteUser($id = NULL){
		if ($id !== NULL) {
			$this->Model_Usuario->deleteUsuario($id);
		}
	}

	public function editUsuario($id = NULL){
		if ($id != NULL) {
			$data['contenido'] = 'usuario/edit';
			$data['datosUsuario'] = $this->Model_Usuario->editUsuario($id);
			$this->load->view('plantilla',$data);
		}else{
			redirect('');
		}
	}


	public function update(){
		$datos = $this->input->post();
		$codigoUsuario = $datos['codigoUsuario'];
		$nombre = $datos['nombre'];
		$edad = $datos['edad'];
		$clave = $datos['clave'];
		$this->Model_Usuario->updateUsuarios($codigoUsuario,$nombre,$edad,$clave);
		redirect('');
	}

	
}