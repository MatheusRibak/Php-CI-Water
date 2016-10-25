<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

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
	public function index()
	{
		$this->load->view('home');
	}

  function pegaDoInput(){
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
