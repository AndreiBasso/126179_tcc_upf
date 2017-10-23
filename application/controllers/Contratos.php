<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Contratos extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) redirect ('login');
        $this->load->model('contratos_model');
        $this->load->model('cliente_model');
        $this->load->model('servicos_model');
    }
    
    public function index(){
        $dados['listaContratos'] = $this->contratos_model->buscar();
        
        
        $this->load->view('template/header');
        $this->load->view('contratos/listaContratos', $dados);
        $this->load->view('template/footer');
    }
    
    public function gravar($id=NULL){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('situacao', 'situacao', 'required');
        if($this->form_validation->run() === false){
            $dados['acao'] = base_url('index.php/contratos/gravar');
            
            $dados['listaCliente'] = $this->cliente_model->buscar();
            $dados['listaServicos'] = $this->servicos_model->buscar();
            $this->load->view('template/header');
            $this->load->view('contratos/formContratos', $dados);
            $this->load->view('template/footer');
        }else{
            if($this->contratos_model->gravar($id)){
                $this->index();
            }else{
                echo "Erro ao tentar gravar os dados";
            }
        }
    }
    
    public function editar($id){
        $contratos = $this->contratos_model->buscar($id);
        if($contratos){
            $dados['contratos'] = $contratos;
            $dados['acao']  = base_url('index.php/contratos/gravar/'.$id);
            $dados['listaCliente'] = $this->cliente_model->buscar();
            $dados['listaServicos'] = $this->servicos_model->buscar();
            $this->load->view('template/header');
            $this->load->view('contratos/formContratos', $dados);
            $this->load->view('template/footer');
            
        }else{
            echo "Erro ao buscar os dados";
        }
    }
    
    public function excluir($id){
        if($this->contratos_model->excluir($id)) $this->index ();
        else echo "Erro ao tentar excluir o registro";
    }

}