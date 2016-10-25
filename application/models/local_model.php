<?php

class Local_model extends CI_Model {

	public $nome_local;
	public $descricao_local;
  public $criador_local;
  public $longitude;
  public $latitude;
  public $data_local;
	public $id_usuario;

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
