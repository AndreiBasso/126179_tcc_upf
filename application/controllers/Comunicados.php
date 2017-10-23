<?php

require_once __DIR__. '../../libraries/vendor/autoload.php';


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Comunicados extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) redirect ('login');
        $this->load->model('cliente_model');
         $this->load->model('comunicados_model');
        $this->load->helper('url_helper');
    }
    
    public function index() {
        $dados['listaCliente'] = $this->cliente_model->buscar();
        
        $this->load->view('template/header');
        $this->load->view('comunicados/index',$dados);
        $this->load->view('template/footer');
    }
    
    public function gravar($id = NULL) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'titulo', 'required');
        if ($this->form_validation->run() === false) {
            $dados['acao'] = base_url('index.php/chamados/gravar');
            //$dados['listaCliente'] = $this->cliente_model->buscar();
            //$this->load->view('template/header');
            //$this->load->view('chamados/formChamados', $dados);
            //$this->load->view('template/footer');
        } else {
            if ($this->comunicados_model->gravar($id)) {
                $this->index();
            }{
              
            } 
        }
    }

}



