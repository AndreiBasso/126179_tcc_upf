<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Chamados extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado'))
            redirect('login');
        $this->load->model('chamados_model');
        $this->load->model('cliente_model');
        $this->load->model('funcionarios_model');
        $this->load->model('equipamentos_model');
        $this->load->model('tipos_model');
    }

    public function index($info = NULL) {
        $dados['listaChamados'] = $this->chamados_model->buscar();
        if (isset($info)) {
            $dados['mensagem'] = $info['mensagem'];
            $dados['tipo_mensagem'] = $info['tipo_mensagem'];
        }
        $pagina['pagina'] = 4;

        $this->load->view('template/header',$pagina);
        $this->load->view('chamados/listaChamados', $dados);
        $this->load->view('template/footer');
    }

    public function gravar($id = NULL) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('situacao', 'situacao', 'required');
        if ($this->form_validation->run() === false) {
            $dados['acao'] = base_url('index.php/chamados/gravar');

            $dados['listaCliente'] = $this->cliente_model->buscar();
            $dados['listaFuncionarios'] = $this->funcionarios_model->buscar();
            $dados['listaEquipamentos'] = $this->equipamentos_model->buscar();
            $dados['listaTipos'] = $this->tipos_model->buscar();
            $this->load->view('template/header');
            $this->load->view('chamados/formChamados', $dados);
            $this->load->view('template/footer');
        } else {
            if ($this->chamados_model->gravar($id)) {
                $this->index();
            } else {
                echo "Erro ao tentar gravar os dados";
            }
        }
    }

    public function editar($id) {
        $chamados = $this->chamados_model->buscar($id);
        if ($chamados) {
            $dados['chamados'] = $chamados;
            $dados['acao'] = base_url('index.php/chamados/gravar/' . $id);
            $dados['listaCliente'] = $this->cliente_model->buscar();
            $dados['listaFuncionarios'] = $this->funcionarios_model->buscar();
            $dados['listaEquipamentos'] = $this->equipamentos_model->buscar();
            $dados['listaTipos'] = $this->tipos_model->buscar();
            $this->load->view('template/header');
            $this->load->view('chamados/formChamados', $dados);
            $this->load->view('template/footer');
        } else {
            echo "Erro ao buscar os dados";
        }
    }

    public function excluir($id) {
        if ($this->session->userdata['logado']['permissao'] === 'admin') {
            if ($this->chamados_model->excluir($id)) {
                $this->index();
            } else {
                echo "Erro ao tentar excluir o registro";
            }
        } else {
            $dados = array(
                'mensagem' => 'Falha ao excluir. Não Possui Permissão Admin!',
                'tipo_mensagem' => 'error');
            $this->index($dados);
        }
    }

}
