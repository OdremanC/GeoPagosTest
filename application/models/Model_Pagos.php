<?php

/**
* 
*/
class Model_Pagos extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function obtenerPagos($id){
		$query = $this->db->query("SELECT distinct p.*,up.codigoUsuario,u.usuario FROM pagos as p INNER JOIN usuariospagos as up ON p.codigoPago =  up.codigoPago 
		INNER JOIN usuarios as u ON u.codigoUsuario = up.codigoUsuario WHERE u.codigoUsuario = $id ");
		return $query->result();
	}
	public function insertPagos($usuario,$importe,$fecha){
		//registro el pago
		$arrayDatos = array(
			'importe' => $importe,
			'fecha' => $fecha
		);
		$this->db->insert('pagos',$arrayDatos);
		//consultamos el ultimo registro
		$codigoPago = $this->db->insert_id();
		if (!empty($codigoPago) && $codigoPago !=NULL) {
	
			$relPagoUsuario = array(
				'codigoPago'=> $codigoPago,
				'codigoUsuario'=>$usuario
			);

			//insertamos la relacion
			$this->db->insert('usuariospagos',$relPagoUsuario);
			

		redirect('pagos/getPagos/'.$usuario);
		}
	}

	public function deletePago($id){
		$query = $this->db->query("SELECT codigoUsuario FROM usuariospagos WHERE codigoPago = $id");
		$usuario = $query->result();

		$this->db->where('codigoPago',$id);	
		$this->db->delete('pagos');
		$this->db->where('codigoPago',$id);	
		$this->db->delete('usuariospagos');
		redirect('pagos/getPagos/'.$usuario[0]->codigoUsuario);
	}

	public function editPago($id){
		$query = $this->db->query("SELECT p.*,up.codigoUsuario,u.usuario FROM pagos as p INNER JOIN usuariospagos as up ON p.codigoPago = up.codigoPago INNER JOIN usuarios as u ON up.codigoUsuario = u.codigoUsuario WHERE p.codigoPago = $id");
		return $query->result();
	}

	public function updatePagos($codigoUsuario,$codigoPago,$importe,$fecha){
		$editData = array(
			'importe' =>$importe,
			'fecha' =>$fecha
		);
		if (!empty($importe) && $importe > 0) {
			$this->db->where('codigoPago',$codigoPago);
			$this->db->update('pagos',$editData);
		}

		$query = $this->db->query("SELECT codigoUsuario FROM usuariospagos WHERE codigoPago = $codigoPago");
		$usuario = $query->result();
		if ($usuario[0]->codigoUsuario != $codigoUsuario) {
			$dataUsuario = array(
				'codigoUsuario'=>$codigoUsuario
			);
			$this->db->where('codigoPago',$codigoPago);
			$this->db->update('usuariospagos',$dataUsuario);

			redirect('pagos/getPagos/'.$codigoUsuario);
		}

		redirect('pagos/getPagos/'.$usuario[0]->codigoUsuario);
	}
}

