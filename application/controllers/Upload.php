<?php
        class Upload extends CI_Controller{

                function __construct(){
                        parent::__construct();
                        $this->load->helper(array('form'));
                }

                function index(){
                        $this->load->view('upload/form_upload');
                }

                function enviar(){
                        //Configurações necessárias para fazer upload do arquivo

                        //Pasta onde será feito o upload
                        $config['upload_path'] = './assets/fotos/';
                        //Tipos suportados
                        $config['allowed_types'] = 'gif|jpg|png';
                        //Configurando atributos do arquivo imagem que iremos receber
                        $config['max_size']     = '100';
                        $config['max_width']  = '1024';
                        $config['max_height']  = '768';

                        //Carregando a lib com as configurações feitas
                        $this->load->library('upload', $config);

                        //Fazendo o upload do arquivo e direcionando para a view de erro ou de sucesso
                        if( ! $this->upload->do_upload('arquivo')){
                                $error = array('error' => $this->upload->display_errors());

                                echo "erro";
                        }
                        else
                        {
                                $data = array('arquivo_data' => $this->upload->data());
                                $teste => $this->upload->data()
                                echo $teste;
                        }
                }
        }
?>
