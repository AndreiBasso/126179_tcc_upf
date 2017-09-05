<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Login extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->library('form_validation');
    }
    
    public function index($dados=NULL) {
        $this->load->view('login/form_login',$dados);
    }
    
    public function validaUsuario() {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('senha', 'senha', 'trim|required');
        
        if($this->form_validation->run()===false){
            $this->load->view('login/form_login');
        }else{
            $dados   = $this->input->post();
            $usuario = $this->usuario_model->validaUsuario($dados);
            if($usuario){
                $logado = array('usuario'=>$usuario['email'],
                                'permissao'=>$usuario['permissao']);
                $this->session->set_userdata('logado', $logado);
                redirect('funcionarios');
            }else{
                $dados = array(
                    'mensagem'=>'Usuário ou senha incorretos. Tente outra vez',
                    'tipo_mensagem'=>'warning'
                );
                $this->load->view('login/form_login',$dados);
            }
        }
    }
    
    public function logoff() {
        $logado = array('usuario'=>'');
        $this->session->unset_userdata('logado', $logado);
        $dados = array(
                    'mensagem'=>'Usuário desconectado.',
                    'tipo_mensagem'=>'success'
                );
        $this->index($dados);
    }
    

}
