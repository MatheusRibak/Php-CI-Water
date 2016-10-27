<?php

class Nascente_model extends CI_Model {

	public $nome_nascente;
	public $descricao_nascente;
  public $criador_nascente;
  public $longitude;
  public $latitude;


	function __construct() {
		parent::__construct();
	}

  function salvar(){
    return $this->db->insert('local', $this);
  }

	function getLocais(){
		$this->db->select('*')
		->from('local');
	 	return $this->db->get()->result();
	}


}
