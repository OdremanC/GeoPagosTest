<?php


/**
* 
*/
class Pagos extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Pagos');
		$this->load->model('Model_Usuario');
	}

	public function index(){
		$data['contenido'] = "pagos/index";
		$data['listaDeUsuarios'] = $this->Model_Usuario->listUsuarios();
		$data['datosUserPagos'] = $this->Model_Pagos->obtenerPagos(1);
		$this->load->view('plantilla',$data);
	}

	public function getPagos($id = NULL){
		if ($id != NULL) {
			$data['contenido'] = "pagos/index";
			$data['datosUserPagos'] = $this->Model_Pagos->obtenerPagos($id);
			$data['listaDeUsuarios'] = $this->Model_Usuario->listUsuarios();
			$data['idUser'] = $id;
			$this->load->view('plantilla',$data);
		}else{
			redirect('');
		}
	}

	public function insert(){
		$datos = $this->input->post();
		$usuario = $datos['usuario'];
		$importe = $datos['importe'];
		$fecha = $datos['fecha'];

		if (!empty($importe) && $importe > 0) {	
			$this->Model_Pagos->insertPagos($usuario,$importe,$fecha);
			redirect('');			
			
		}	
	}

	public function deletePago($id = NULL){
		if ($id !== NULL) {
			$this->Model_Pagos->deletePago($id);
		}
	}

	public function editPago($id){
		if ($id != NULL) {
			$data['contenido'] = 'pagos/editar';
			$data['datosPago'] = $this->Model_Pagos->editPago($id);
			$data['listaDeUsuarios'] = $this->Model_Usuario->listUsuarios();
			$this->load->view('plantilla',$data);
		}else{
			redirect('');
		}
	}
	public function updatePago(){
		$datos = $this->input->post();
		$codigoUsuario = $datos['usuario'];
		$codigoPago = $datos['codigoPago'];
		$importe = $datos['importe'];
		$fecha = $datos['fecha'];
		$this->Model_Pagos->updatePagos($codigoUsuario,$codigoPago,$importe,$fecha);
		redirect('pagos/getPagos/'.$codigoUsuario);
	}
}

