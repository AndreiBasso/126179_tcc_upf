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

class User extends CI_Controller {
    
    function __construct() {
        parent::__construct();
         if ($this->session->userdata['logado']['permissao'] === 'user') redirect ('login');
        if (!$this->session->userdata['logado']) redirect ('login');
        
        $this->load->model('user_model');
        $this->load->helper('url_helper');
    }
    
    public function index() {
        $dados['registros'] = $this->user_model->buscar();
        
        $this->load->view('template/header');
        $this->load->view('user/index', $dados);
        $this->load->view('template/footer');
    }
    
    public function excluir($id) {
        $r = $this->user_model->delete($id);
        if($r) $this->index();
    }
    
    public function gravar($id=NULL){
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'email', 'required');
        if($this->form_validation->run() === false){
            $dados['acao'] = base_url('index.php/user/gravar');
            
            $this->load->view('template/header');
            $this->load->view('user/formUser', $dados);
            $this->load->view('template/footer');
        }else{
            if($this->user_model->gravar($id)){
                $this->index();
            }else{
                echo "Erro ao tentar gravar os dados";
            }
        }
    }
    
    public function atualizar($id) {
        $user = $this->user_model->buscar($id);
        if(isset($user)){
            $dados['acao']   = base_url('index.php/user/gravar/'.$id); 
            $dados['user'] = $user;
            
            $this->load->view('template/header');
            $this->load->view('user/formUser', $dados);
            $this->load->view('template/footer');
        }else{
            echo "Erro ao tentar localizar os dados do Registro";
        }
    }

}
