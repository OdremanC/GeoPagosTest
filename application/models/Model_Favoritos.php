<?php


/**
* 
*/
class Model_Favoritos extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function obtenerFavoritos($id){
		$query = $this->db->query("SELECT f.codigoUsuario,u.usuario,f.codigoUsuarioFavorito,uu.usuario as favorito FROM `favoritos` as f
									INNER JOIN usuarios as u ON f.codigoUsuario = u.codigoUsuario
									INNER JOIN usuarios as uu ON f.codigoUsuarioFavorito = uu.codigoUsuario
									WHERE f.codigoUsuario = $id ");
		return $query->result();
	}

	public function insertFavoritos($usuario,$codigoUsuario){

		$arrayDatos = array(
			'codigoUsuario' => $codigoUsuario,
			'codigoUsuarioFavorito' => $usuario
		);
		$this->db->insert('favoritos',$arrayDatos);
		
		redirect('favoritos/getFavoritos/'.$codigoUsuario);
	}

	public function obtenerLista($id){
		$query = $this->db->query("SELECT * FROM usuarios WHERE codigoUsuario NOT IN (SELECT DISTINCT codigoUsuarioFavorito FROM favoritos WHERE codigoUsuario = $id) AND codigoUsuario != $id");
		return $query->result();
	}
	public function updateFavoritos($codigoUsuario,$Favoritos){
		$editData = array(
			'codigoUsuarioFavorito' =>$Favoritos
		);
		$this->db->where('codigoUsuario',$codigoUsuario);	
		$this->db->update('favoritos',$editData);
		redirect('favoritos/getFavoritos/'.$codigoUsuario);
	}

	public function deleteFavorito($codigoUsuario,$codigoUsuarioFavorito){
		$editData = array(
			'codigoUsuarioFavorito'=>$codigoUsuarioFavorito
		);

		$this->db->where('codigoUsuario',$codigoUsuario);	
		$this->db->where('codigoUsuarioFavorito',$codigoUsuarioFavorito);
		$this->db->delete('favoritos');
		redirect('favoritos/getFavoritos/'.$codigoUsuario);
	}
}
