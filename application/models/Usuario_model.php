<?php

class Usuario_model extends CI_Model {

	public $nome;
  public $email;
  public $senha;
	public $cpf;
	public $telefone; 

	function __construct() {
		parent::__construct();
	}

  function salvar(){
    return $this->db->insert('cidade_nascente', $this);
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
