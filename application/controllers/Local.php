<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local extends CI_Controller {

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

  public function salvarLocal(){

    $dados = array();
    $this->Local_model->nome_local = $this->input->post('nome');
    $this->Local_model->descricao_local = $this->input->post('descricao');
    $this->Local_model->criador_local = $this->input->post('criador');
    $this->Local_model->longitude = $this->input->post('longitude');
    $this->Local_model->latitude = $this->input->post('latitude');
    $this->Local_model->data_local = $this->input->post('data_local');

   //$this->Local_model->Salvar();

		$this->load->library('googlemaps');
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['map_type'] = 'SATELLITE';
		$this->googlemaps->initialize($config);

		$dadosLocais = $this->Local_model->getLocais();

		foreach ($dadosLocais as $row) {
			$marker = array();
			echo 'Latitude: ' . $row->latitude . '</br>';
			echo 'Longitude: ' . $row->longitude . '</br>';
			$marker['position'] = $row->latitude . ',' . $row->longitude;
			$marker['title'] = $row->nome_local;
			$marker['infowindow_content'] =  	'<h2>'. $row->nome_local . '</h2>' . 'Descrição: ' . $row->descricao_local;
			$this->googlemaps->add_marker($marker);

		}
			$data['map'] = $this->googlemaps->create_map();

		$this->load->view('view_file', $data);

}
}
