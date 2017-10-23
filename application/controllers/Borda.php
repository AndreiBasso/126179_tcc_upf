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

class Borda extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) redirect ('login');
        $this->load->model('borda_model');
        $this->load->model('pops_model');
        $this->load->model('equipamentos_model');
    }
    
    public function index(){
        $dados['listaBorda'] = $this->borda_model->buscar();
        
        
        $this->load->view('template/header');
        $this->load->view('borda/listaBorda', $dados);
        $this->load->view('template/footer');
    }
    
    public function gravar($id=NULL){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('idpops', 'idpops', 'required');
        if($this->form_validation->run() === false){
            $dados['acao'] = base_url('index.php/borda/gravar');
            
            $dados['listaPops'] = $this->pops_model->buscar();
             $dados['listaEquipamentos'] = $this->equipamentos_model->buscar();
            $this->load->view('template/header');
            $this->load->view('borda/formBorda', $dados);
            $this->load->view('template/footer');
        }else{
            if($this->borda_model->gravar($id)){
                $this->index();
            }else{
                echo "Erro ao tentar gravar os dados";
            }
        }
    }
    
    public function editar($id){
        $borda = $this->borda_model->buscar($id);
        if($borda){
            $dados['borda'] = $borda;
            $dados['acao']  = base_url('index.php/borda/gravar/'.$id);
            $dados['listaPops'] = $this->pops_model->buscar();
             $dados['listaEquipamentos'] = $this->equipamentos_model->buscar();
            $this->load->view('template/header');
            $this->load->view('borda/formBorda', $dados);
            $this->load->view('template/footer');
            
        }else{
            echo "Erro ao buscar os dados";
        }
    }
    
    public function excluir($id){
        if($this->borda_model->excluir($id)) $this->index ();
        else echo "Erro ao tentar excluir o registro";
    }
}