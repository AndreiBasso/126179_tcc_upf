<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Orcamento extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) redirect ('login');
        $this->load->model('orcamento_model');
        $this->load->model('cliente_model');
        $this->load->model('servicos_model');
    }
    
    public function index(){
        $dados['listaOrcamento'] = $this->orcamento_model->buscar();
        
        
        $this->load->view('template/header');
        $this->load->view('orcamento/listaOrcamento', $dados);
        $this->load->view('template/footer');
    }
    
    public function gravar($id=NULL){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('situacao', 'situacao', 'required');
        if($this->form_validation->run() === false){
            $dados['acao'] = base_url('index.php/orcamento/gravar');
            
            $dados['listaCliente'] = $this->cliente_model->buscar();
            $dados['listaServicos'] = $this->servicos_model->buscar();
            $this->load->view('template/header');
            $this->load->view('orcamento/formOrcamento', $dados);
            $this->load->view('template/footer');
        }else{
            if($this->orcamento_model->gravar($id)){
                $this->index();
            }else{
                echo "Erro ao tentar gravar os dados";
            }
        }
    }
    
    public function editar($id){
        $orcamento = $this->orcamento_model->buscar($id);
        if($orcamento){
            $dados['orcamento'] = $orcamento;
            $dados['acao']  = base_url('index.php/orcamento/gravar/'.$id);
            $dados['listaCliente'] = $this->cliente_model->buscar();
            $dados['listaServicos'] = $this->servicos_model->buscar();
            $this->load->view('template/header');
            $this->load->view('orcamento/formOrcamento', $dados);
            $this->load->view('template/footer');
            
        }else{
            echo "Erro ao buscar os dados";
        }
    }
    
    public function excluir($id){
        if($this->orcamento_model->excluir($id)) $this->index ();
        else echo "Erro ao tentar excluir o registro";
    }

}