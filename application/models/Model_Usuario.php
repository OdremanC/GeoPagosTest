<?php

/**
* 
*/
class Model_Usuario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//metodo select

	public function listUsuarios(){
		$query = $this->db->query("SELECT * FROM usuarios");
		return $query->result();
	}

	public function insertUsuarios($nombre,$edad,$clave){
		$arrayDatos = array(
			'usuario' => $nombre,
			'edad' => $edad,
			'clave' => $clave
		);

		$this->db->insert('usuarios',$arrayDatos);
	}
	public function deleteUsuario($id){
		$this->db->where('codigoUsuario',$id);	
		$this->db->delete('usuarios');
		redirect('');
	}

	public function editUsuario($id){
		$query = $this->db->query("SELECT * FROM usuarios WHERE codigoUsuario = $id");
		return $query->result();
	}

	public function updateUsuarios($codigoUsuario,$nombre,$edad,$clave){
		$editData = array(
			'usuario' =>$nombre,
			'edad' =>$edad,
			'clave' => $clave
		);
		if ($edad > 18 && !empty($edad) && !empty($nombre)) {
			$this->db->where('codigoUsuario',$codigoUsuario);
			$this->db->update('usuarios',$editData);
		}
		
		redirect('');
	}

	


}