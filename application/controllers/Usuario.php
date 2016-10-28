<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

  /**
  * Index Page for this controller.
  *
  * Maps to the following URL
  * 		http://example.com/index.php/welcome
  *	- or -
  * 		http://example.com/index.php/welcome/index
  *	- or -
  * Since this controller is set as the default controller in
  * config/routes.php, it's displayed at http://example.com/
  *
  * So any other public methods not prefixed with an underscore will
  * map to /index.php/welcome/<method_name>
  * @see https://codeigniter.com/user_guide/general/urls.html
  */
  public function index(){
    $this->load->view('home');
  }

  public function carregaCadastrarUsuario(){
    $this->load->view('cadastrar_usuario');
  }

  public function cadastrarUsuario(){
    $data = array();


    $this->db->select('email');
    $this->db->where('email', $this->input->post('email'));
    $retorno = $this->db->get('usuario')->num_rows();
    //verifica se já existe um email igual cadastrado, caso exista vai mostrar a mensagem
    //caso não o cadastro será realizado
    if ($retorno > 0) {
      redirect('Usuario/carregaCadastrarUsuario/?aviso=2');
    } else {
      //aqui faz a validação
      //se é requirido, tamanho maximo, se deve ser um email valido, entre outros.
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
      $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[120]');
      $this->form_validation->set_rules('telefone', 'Telefone', 'required|max_length[15]');
      $this->form_validation->set_rules('email', 'E-mail', 'required|max_length[120]|valid_email');
      $this->form_validation->set_rules('senha', 'Senha', 'required|max_length[120]');
      $this->form_validation->set_rules('cpf', 'CPF', 'required|max_length[120]');
      $this->form_validation->set_rules('estado', 'Estado', 'required|max_length[120]');
      $this->form_validation->set_rules('cidade', 'Cidade', 'required|max_length[120]');


      if ($this->form_validation->run() == FALSE) {
        $this->carregaCadastrarUsuario();
        return;
      } else {
        //pegando os dados do formulário
        $this->Usuario_model->nome = $this->input->post('nome');
        $this->Usuario_model->email = $this->input->post('email');
        $this->Usuario_model->senha = md5($this->input->post('senha'));
        $this->Usuario_model->telefone = $this->input->post('telefone');
        $this->Usuario_model->cpf = $this->input->post('cpf');

        $rua = $this->input->post('rua');
        $estado = $this->input->post('estado');
        $cidade = $this->input->post('cidade');
        $numero = $this->input->post('numero');

        $this->Usuario_model->salvarUsuario();
        $this->db->select('id_usuario');
        $this->db->where('email', $this->input->post('email'));
        $id_usuario = $this->db->get('usuario')->result();

        foreach ($id_usuario as $id) {
          echo $id->id_usuario;

          $this->Endereco_model->cadastrarEndereco([
             "rua" => $rua,
             "estado" => $estado,
             "cidade" => $cidade,
             "numero" => $numero,
             "id_usuario" => $id->id_usuario
         ]);
        }
          redirect('Usuario/carregaCadastrarUsuario/?aviso=1');
      }
    }



  }

  public function realizarLogin(){
    //pega os dados vindos do login
    $usuario_email = $this->input->post('email');
    $usuario_senha = $this->input->post('senha');
    //fazendo a validação do formulario de login
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    $this->form_validation->set_rules('email', 'email', 'required|max_length[120]');
    $this->form_validation->set_rules('senha', 'Senha', 'required|max_length[120]');
    if ($this->form_validation->run() == FALSE) {
      $this->index();
      return;
    }
    //seleciona os dados na tabela do usuario
    $this->db->select("*")
    ->from("usuario")
    ->where("email", $usuario_email)
    ->where("senha", md5($usuario_senha));
    $dadosUsuario = $this->db->get();
    //se tiver um igual vai fazer o login e passar o id
    if ($dadosUsuario->num_rows() > 0) {
      $usuario = $dadosUsuario-> row();
      $this->session->set_userdata('logado', TRUE);
      $this->session->set_userdata('id_usuario', $usuario->id_usuario);
      redirect('/Painel_usuario');
    } else {
      //se não tiver login e senha certo vai cair aqui
      redirect('Usuario/index/?aviso=1');
    }
  }

}
