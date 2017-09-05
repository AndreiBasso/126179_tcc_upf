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

class Cliente extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) redirect ('login');
        $this->load->model('cliente_model');
        $this->load->model('pops_model');
    }
    
    public function index(){
        $dados['listaCliente'] = $this->cliente_model->buscar();
        
        
        $this->load->view('template/header');
        $this->load->view('cliente/listaCliente', $dados);
        $this->load->view('template/footer');
    }
    
    public function gravar($id=NULL){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('idpops', 'idpops', 'required');
        if($this->form_validation->run() === false){
            $dados['acao'] = base_url('index.php/cliente/gravar');
            
            $dados['listaPops'] = $this->pops_model->buscar();
            $this->load->view('template/header');
            $this->load->view('cliente/formCliente', $dados);
            $this->load->view('template/footer');
        }else{
            if($this->cliente_model->gravar($id)){
                $this->index();
            }else{
                echo "Erro ao tentar gravar os dados";
            }
        }
    }
    
    public function editar($id){
        $cliente = $this->cliente_model->buscar($id);
        if($cliente){
            $dados['cliente'] = $cliente;
            $dados['acao']  = base_url('index.php/cliente/gravar/'.$id);
            $dados['listaPops'] = $this->pops_model->buscar();
            $this->load->view('template/header');
            $this->load->view('cliente/formCliente', $dados);
            $this->load->view('template/footer');
            
        }else{
            echo "Erro ao buscar os dados";
        }
    }
    
    public function excluir($id){
        if($this->cliente_model->excluir($id)) $this->index ();
        else echo "Erro ao tentar excluir o registro";
    }

}