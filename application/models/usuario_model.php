<?php

class Usuario_model extends CI_Model {

	public $nome;
  public $email;
  public $senha;

	function __construct() {
		parent::__construct();
	}

  function salvar(){
    return $this->db->insert('local', $this);
  }

	function getUsuario(){
		$this->db->select('*')
		->from('usuario');
	 	return $this->db->get();
	}


}
