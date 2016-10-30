<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nascente extends CI_Controller
{
    public function index()
    {
        $this->load->view('home');
    }

    function carregaCadastrarNascente()
    {
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('usuario/cadastrar_nascente');
        $this->load->view('template/footer');
    }

    function cadastrarNascente()
    {
        $dados = array();
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
            redirect('Nascente/carregaCadastrarNascente/?aviso=1');
        }
    }

    function listarNascentes(){
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('nascente/listagem');
        $this->load->view('template/footer');
    }
}