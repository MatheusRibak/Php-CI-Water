<?php

class Nascente_model extends CI_Model
{
  public $nome_nascente;
  public $descricao_nascente;
  public $criador_nascente;
  public $longitude;
  public $latitude;
  public $foto;


  function __construct()
  {
    parent::__construct();
  }

  function salvar()
  {
    return $this->db->insert('cidade_nascente', $this);
  }

  function getLocais()
  {
    $this->db->select('*')
    ->from('cidade_nascente');
    return $this->db->get()->result();
  }

  function listarNascentes(){
    //vai listar apenas as nascentes que o usuário cadastrou
    $this->db->select('*')
    ->from('cidade_nascente')
    ->where('criador_nascente', $id_usuario = $this->session->userdata('id_usuario'));
    return $this->db->get()->result();
  }

  function listarTodasNascentes(){
    //vai listar apenas as nascentes que o usuário cadastrou
    $this->db->select('*')
    ->from('cidade_nascente');
    return $this->db->get()->result();
  }

  function nascenteSozinha($id_nascente)
  {
    $this->db->select('*')
    ->from('cidade_nascente')
    ->where('cd_local', $id_nascente);
    return $this->db->get()->result();
  }

  function alterar($data, $id_nascente) {
    $id_usuario = $this->session->userdata('id_usuario');
    $this->db->where('cd_local', $id_nascente);
    $this->db->set($data);
    return $this->db->update('cidade_nascente');
  }

  function getLocalSozinho($id_nascente){
    $this->db->select('*')
    ->from('cidade_nascente')
    ->where('cd_local', $id_nascente);
    return $this->db->get()->row();
  }
}
