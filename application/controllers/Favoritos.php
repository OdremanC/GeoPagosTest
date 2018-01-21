<?php

/**
* 
*/
class Favoritos extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Favoritos');
		$this->load->model('Model_Usuario');
	}

	public function index(){
		$data['contenido'] = "favoritos/index";
		$data['listaDeUsuarios'] = $this->Model_Usuario->listUsuarios();
		$data['datosUserFavoritos'] = $this->Model_Favoritos->obtenerFavoritos(1);
		$this->load->view('plantilla',$data);
	}
	public function insert(){

		$datos = $this->input->post();
		$usuario = $datos['usuario'];
		$codigoUsuario = $datos['codigoUsuario'];
		if (!empty($usuario)) {	
			$this->Model_Favoritos->insertFavoritos($usuario,$codigoUsuario);
			//redirect('favoritos/getFavoritos/'.$codigoUsuario);			
		}	
	}

	public function getFavoritos($id){
		if ($id != NULL) {
			$data['contenido'] = "favoritos/index";
			$data['datosUserFavoritos'] = $this->Model_Favoritos->obtenerFavoritos($id);
			$data['listaDeUsuarios'] = $this->Model_Favoritos->obtenerLista($id);
			$data['idUser'] = $id;
			$this->load->view('plantilla',$data);
		}else{
			redirect('');
		}
	}

	public function editFavorito($id){
		if ($id != NULL) {
			$data['contenido'] = 'favoritos/editar';
			$data['datosUserFavoritos'] = $this->Model_Favoritos->obtenerFavoritos($id);
			$data['listaDeUsuarios'] = $this->Model_Favoritos->obtenerLista($id);
			//$data['listaDeUsuarios'] = $this->Model_Usuario->listUsuarios();
			$this->load->view('plantilla',$data);
		}else{
			redirect('');
		}
	}
	public function updateFavoritos(){
		$datos = $this->input->post();
		$Favoritos = $datos['usuario'];
		$codigoUsuario = $datos['codigoUsuario'];
		
		$this->Model_Favoritos->updateFavoritos($codigoUsuario,$Favoritos);
		redirect('favoritos/getFavoritos/'.$codigoUsuario);
	}
	public function deleteFavorito($id = NULL){
		$data = explode('-', $id);
		$codigoUsuario = $data[1];
		$codigoUsuarioFavorito = $data[0];

		if ($id !== NULL) {
			$this->Model_Favoritos->deleteFavorito($codigoUsuario,$codigoUsuarioFavorito);
		}
	}
}



?>