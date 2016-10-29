<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller
{
    public function index()
    {
        $this->load->view('home');
    }

    function pegaDoInput()
    {
        //pegando apenas uma varivel
        $variavel1 = $this->input->post('variavel1');
        $variavel2 = $this->input->post('variavel2');
        echo $variavel1 . '<br>' . $variavel2;
        //já se tivesse um model com os atributos.
        //  $data = array();
        //	$this->Controller_model->variavel1 = $this->input->post('variavel1');
        //	$this->Controller_model->variavel2 = $this->input->post('variavel2');;

        //	$this->Controller_model->seu_metodo($data);
    }
}
