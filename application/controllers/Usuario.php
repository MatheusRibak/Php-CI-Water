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
      redirect('/Login/?aviso=1');
    }
  }

}
