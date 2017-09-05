<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Pops extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) redirect ('login');
        $this->load->model('pops_model');
        $this->load->model('funcionarios_model');
        $this->load->helper('url_helper');
    }
    
        public function index($info = NULL) {
        $dados['registros'] = $this->pops_model->buscar();
        if (isset($info)) {
            $dados['mensagem'] = $info['mensagem'];
            $dados['tipo_mensagem'] = $info['tipo_mensagem'];
        }
        $pagina['pagina'] = 4;
        $this->load->view('template/header', $pagina);
        $this->load->view('pops/index', $dados);
        $this->load->view('template/footer');
    }

    public function excluir($id) {
        $r = $this->pops_model->delete($id);
        if ($r) {
            $this->index();
        } else {
            $dados = array(
                'mensagem' => 'Falha ao excluir!',
                'tipo_mensagem' => 'error');
            $this->index($dados);
        }
    }
    
   
    
    public function gravar($id=NULL){
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nome', 'nome', 'required');
        if($this->form_validation->run() === false){
            $dados['acao'] = base_url('index.php/pops/gravar');
            
            $dados['listaFuncionarios'] = $this->funcionarios_model->buscar();
            $this->load->view('template/header');
            $this->load->view('pops/formPops', $dados);
            $this->load->view('template/footer');
        }else{
            if($this->pops_model->gravar($id)){
                $this->index();
            }else{
                $dados = array(
                'mensagem' => 'Falha ao atualizar registro, dados permetidos incoretos!',
                'tipo_mensagem' => 'error');
               $this->index($dados);
               
            }
        }
    }
    
    public function atualizar($id) {
        $pops = $this->pops_model->buscar($id);
        if(isset($pops)){
            $dados['acao']   = base_url('index.php/pops/gravar/'.$id); 
            $dados['pops'] = $pops;
            $dados['listaFuncionarios'] = $this->funcionarios_model->buscar();
            
            $this->load->view('template/header');
            $this->load->view('pops/formPops', $dados);
            $this->load->view('template/footer');
        }else{
            echo "Erro ao tentar localizar os dados do Registro";
        }
    }

}
