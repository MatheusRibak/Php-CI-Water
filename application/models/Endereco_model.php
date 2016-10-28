<?php

class Endereco_model extends CI_Model {

	public $rua;
  public $estado;
  public $cidade;
  public $id_usuario;
  public $numero;

	function __construct() {
		parent::__construct();
	}

  function cadastrarEndereco($data){
     $this->db->insert('endereco', $data);
  }

	function salvarUsuario(){
		return $this->db->insert('usuario', $this);
	}

	function getUsuario(){
		$this->db->select('*')
		->from('usuario');
	 	return $this->db->get();
	}


}
