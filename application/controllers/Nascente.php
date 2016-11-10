<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nascente extends MY_ControllerLogado
{
  public function index()
  {
    $this->load->view('home');
  }

  function carregaCadastrarNascente()
  {
    $data = array('pos' => 1);

    $this->load->view('template/header');
    $this->load->view('template/menu', $data);
    $this->load->view('usuario/cadastrar_nascente');
    $this->load->view('template/footer');
  }

  function cadastrarNascente()
  {
    $dados = array();

    //verifica se uma nascente já está cadastrada no site
    $this->db->select('*');
    $this->db->where('longitude', $this->input->post('longitude'));
    $this->db->where('latitude', $this->input->post('latitude'));
    $retorno = $this->db->get('cidade_nascente')->num_rows();
    //se já estiver vai ser dado um aviso ao usuario
    if ($retorno > 0) {
        redirect('Painel_usuario/index/?aviso=2');
    } else {
      //se não tiver o cadastro da nascente vai ser feito
      //pegando os dados dos inputs
    $this->Nascente_model->nome_nascente = $this->input->post('nome');
    $this->Nascente_model->descricao_nascente = $this->input->post('descricao');
    $this->Nascente_model->criador_nascente = $this->session->userdata('id_usuario');
    $this->Nascente_model->longitude = $this->input->post('longitude');
    $this->Nascente_model->latitude = $this->input->post('latitude');

    //realizando a validação do formulário
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[120]');
    $this->form_validation->set_rules('descricao', 'Descrição', 'required|max_length[1200]');
    $this->form_validation->set_rules('latitude', 'Latitude', 'required|max_length[120]');
    $this->form_validation->set_rules('longitude', 'Longitude', 'required|max_length[120]');

    //caso a validação não esteja correta, o cadastro não vai ser feito e será mostrada uma mensagem informando o input que não está correto
    if ($this->form_validation->run() == FALSE) {
      $this->carregaCadastrarNascente();
      return;
    } else {
      //se estiver certa vai realizar o cadastro da nascente
      $this->Nascente_model->Salvar();
      redirect('Painel_usuario/index/?aviso=1');
    }
  }
}

  function listarNascentes(){
    $data = array(
      "minhasNascentes" => $this->Nascente_model->listarNascentes()
    );
    $dataMenu = array('pos' => 2);
    $this->load->view('template/header');
    $this->load->view('template/menu_sem_form', $dataMenu);
    $this->load->view('nascente/listagem', $data);
    $this->load->view('template/footer');
  }

  function carregaEditarNascente($id_nascente){
    $dataMenu = array('pos' => 2);
    $data = array(
      "nascente" => $this->Nascente_model->nascenteSozinha($id_nascente)
    );
    $this->load->view('template/header');
    $this->load->view('template/menu_sem_form', $dataMenu);
    $this->load->view('nascente/editar_nascente', $data);
    $this->load->view('template/footer');
  }

  function salvarEdicao(){

    $nome = $this->input->post('nome');
    $descricao = $this->input->post('descricao');
    $longitude = $this->input->post('longitude');
    $latitude = $this->input->post('latitude');
    $id_nascente = $this->input->post('cd_local');

    //realizando a validação do formulário
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[120]');
    $this->form_validation->set_rules('descricao', 'Descrição', 'required|max_length[1200]');
    $this->form_validation->set_rules('latitude', 'Latitude', 'required|max_length[120]');
    $this->form_validation->set_rules('longitude', 'Longitude', 'required|max_length[120]');

    //caso a validação não esteja correta, o cadastro não vai ser feito e será mostrada uma mensagem informando o input que não está correto
    if ($this->form_validation->run() == FALSE) {
      $this->carregaEditarNascente($id_nascente);
      return;
    } else {
      //se estiver certa vai realizar o cadastro da nascente
      $this->Nascente_model->alterar([
        "nome_nascente" => $nome,
        "latitude" => $latitude,
        "longitude" =>$longitude,
        "descricao_nascente" => $descricao
      ], $id_nascente);
      redirect('Nascente/listarNascentes/?aviso=1');
    }
  }
}
