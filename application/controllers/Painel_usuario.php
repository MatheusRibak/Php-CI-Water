<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel_usuario extends MY_ControllerLogado
{
    public function index()
    {

        $id_usuario = $this->session->userdata('id_usuario');

        // 'Latitude, Longitude'
        $this->load->library('googlemaps');
        $config['center'] = '-26.876944, -52.403889';
        $config['zoom'] = 'auto';
        $config['map_type'] = 'SATELLITE';
        $this->googlemaps->initialize($config);

        $dadosLocais = $this->Nascente_model->getLocais();

        foreach ($dadosLocais as $row) {
            $marker = array();
            $marker['position'] = $row->latitude . ',' . $row->longitude;
            $marker['title'] = $row->nome_nascente;
            $dadosUsuario = $this->Usuario_model->getUsuario()->row();
            $marker['infowindow_content'] = '<h2>' . $row->nome_nascente . '</h2>' . 'Descrição: '
                . $row->descricao_nascente . '</br>' . 'Latitude: ' . $row->latitude
                . '</br>' . 'Longitude: ' . $row->longitude
                . '</br>' . 'Usuário que Cadastrou: ' . $dadosUsuario->nome;

            $this->googlemaps->add_marker($marker);

        }
        $data['map'] = $this->googlemaps->create_map();

        $dataMenu = array('pos' => 0);
        $this->load->view('template/header');
        $this->load->view('template/menu', $dataMenu);
        $this->load->view('usuario/painel_usuario', $data);
        $this->load->view('template/footer');
    }

    function procurarNascestes(){
      $busca = $this->input->post('input_busca');


      $this->db->select('*')
      ->from('municipiosbrasil')
      ->where('MUNICIPIO', $busca);
    $teste =   $this->db->get()->row();


echo $teste->MUNICIPIO;
echo $teste->LATITUDE;
echo $teste->LONGITUDE;


$latitude =  $teste->LATITUDE;
$longitude =  $teste->LONGITUDE;

    $id_usuario = $this->session->userdata('id_usuario');

    // 'Latitude, Longitude'
    $this->load->library('googlemaps');


      $config['center'] = $latitude . ',' . $longitude;
      $config['zoom'] = 'auto';
      $config['map_type'] = 'SATELLITE';
      $this->googlemaps->initialize($config);





    $data['map'] = $this->googlemaps->create_map();


    $dataMenu = array('pos' => 0);
   $this->load->view('template/header');
  $this->load->view('template/menu', $dataMenu);
    $this->load->view('usuario/painel_usuario', $data);
   $this->load->view('template/footer');


    }
}
