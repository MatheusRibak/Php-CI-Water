<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel_usuario extends CI_Controller {

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

    $id_usuario = $this->session->userdata('id_usuario');

    $this->load->library('googlemaps');
    $config['center'] = '37.4419, -122.1419';
    $config['zoom'] = 'auto';
    $config['map_type'] = 'SATELLITE';
    $this->googlemaps->initialize($config);

    $dadosLocais = $this->Nascente_model->getLocais();

    foreach ($dadosLocais as $row) {
      $marker = array();
      $marker['position'] = $row->latitude . ',' . $row->longitude;
      $marker['title'] = $row->nome_nascente;
      $dadosUsuario = $this->Usuario_model->getUsuario()->row();
      $marker['infowindow_content'] =  	'<h2>'. $row->nome_nascente . '</h2>' . 'Descrição: '
       . $row->descricao_nascente . '</br>' . 'Latitude: ' . $row->latitude
       . '</br>' . 'Longitude: ' . $row->longitude
       . '</br>' . 'Usuário que Cadastrou: ' . $dadosUsuario->nome;
      $this->googlemaps->add_marker($marker);

    }
      $data['map'] = $this->googlemaps->create_map();

    $this->load->view('usuario/painel_usuario', $data);
  }


}
