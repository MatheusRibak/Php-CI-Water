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

      //Configurações necessárias para fazer upload do arquivo

      //Pasta onde será feito o upload
      $config['upload_path'] = './assets/fotos/';
      //Tipos suportados
      $config['allowed_types'] = 'jpg|png';
      //Configurando atributos do arquivo imagem que iremos receber
      $config['max_size']     = '32910321';
      $config['max_width']  = '1024';
      $config['max_height']  = '768';
      //Carregando a lib com as configurações feitas
      $this->load->library('upload', $config);

      //caso a validação não esteja correta, o cadastro não vai ser feito e será mostrada uma mensagem informando o input que não está correto
      if ($this->form_validation->run() == FALSE) {
        $this->carregaCadastrarNascente();
        return;
      } else {

        // avisando se a imagem não estiver nos paramestros certos.
        if( !$this->upload->do_upload('arquivo')){
          $error = array('error' => $this->upload->display_errors());
          redirect('Painel_usuario/index/?aviso=3');
        }
        else
        {
          // se estiver certa vai realizar o cadastro da nascente
          $imagem = $this->upload->data();
          //pegando a url aonde a imagem vai ser salva
          $file_url = base_url("assets/fotos/{$imagem['file_name']}");
          $this->Nascente_model->foto = $file_url;
          $this->Nascente_model->Salvar();
          redirect('Painel_usuario/index/?aviso=1');
        }
      }
    }
  }


  function cadastrarNascenteSozinha(){
    $dataMenu = array('pos' => 0);

    $this->load->view('template/header');
    $this->load->view('template/menu_sem_form', $dataMenu);
    $this->load->view('nascente/cadastrar_nascente');
    $this->load->view('template/footer');
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

  function listarTodasNascentes(){
    $data = array(
      "minhasNascentes" => $this->Nascente_model->listarTodasNascentes()
    );
    $dataMenu = array('pos' => 3);
    $this->load->view('template/header');
    $this->load->view('template/menu_sem_form', $dataMenu);
    $this->load->view('nascente/todas_as_nascentes', $data);
    $this->load->view('template/footer');
  }

  public function verImagem(){
    $this->load->view('nascente/ver_imagem');
  }

  public function carregaVerNascente($id_nascente){

    $this->db->select('*')
        ->from('cidade_nascente')
        ->where('cd_local', $id_nascente);
    $teste = $this->db->get()->row();

    $id_usuario = $this->session->userdata('id_usuario');

    // 'Latitude, Longitude'
    $this->load->library('googlemaps');

    $config['cluster'] = 'TRUE';
    $dadosLocais = $this->Nascente_model->getLocalSozinho($id_nascente);

  //  $lat = str_replace(",", ".", $teste->latitude);

  //  $long = str_replace(",", ".", $teste->longitude);
    $config['center'] = $dadosLocais->latitude . ',' . $dadosLocais->longitude;
    $config['zoom'] = 'auto';
    $config['map_type'] = 'SATELLITE';
    //passando para os inputs os dados na hora em que clicar no mapa
    $config['onclick'] = '$("#txtLatitude").val(event.latLng.lat()); $("#txtLongitude").val(event.latLng.lng());';

    $marker = array();
    $marker['position'] = $dadosLocais->latitude . ',' . $dadosLocais->longitude;
    $marker['title'] = $dadosLocais->nome_nascente;
    $dadosUsuario = $this->Usuario_model->getUsuario()->row();
    $marker['infowindow_content'] = '<h2>' . $dadosLocais->nome_nascente . '</h2>' . 'Descrição: '
        . $dadosLocais->descricao_nascente . '</br>' . 'Latitude: ' . $dadosLocais->latitude
        . '</br>' . 'Longitude: ' . $dadosLocais->longitude
        . '</br>' . 'Usuário que Cadastrou: ' . $dadosUsuario->nome
        . '</br>' . 'Imagem: '
        . '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalImagem' . $dadosLocais->cd_local .'">'
        . ' Abrir imagem '
        . '</button>';
    $this->googlemaps->add_marker($marker);
    $this->googlemaps->initialize($config);
    $data['map'] = $this->googlemaps->create_map();
    $data['nascente'] = $dadosLocais;
    $dataMenu = array('pos' => 0);
    $this->load->view('template/header', $data);
    $this->load->view('template/menu', $dataMenu);
    $this->load->view('template/footer');
    $this->load->view('nascente/ver_todas_nascentes');
  }
}
