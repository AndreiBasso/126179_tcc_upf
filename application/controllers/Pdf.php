<?php

require_once __DIR__. '../../libraries/vendor/autoload.php';

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

class Pdf extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) redirect ('login');
        $this->load->model('cliente_model');
        $this->load->model('borda_model');
        $this->load->model('equipamentos_model');
        $this->load->model('pops_model');
         $this->load->model('user_model');
         $this->load->model('funcionarios_model');
        $this->load->helper('url_helper');
    }
    
    public function index() {
     
        
        $this->load->view('template/header');
        $this->load->view('pdf/index');
        $this->load->view('template/footer');
    }
    
     public function relatorioClientes() {
        $dados = $this->cliente_model->buscar();
        $mpdf = new mPDF();
        $html = $this->getHTMLClientes($dados);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function relatorioConcentradores() {
        $dados = $this->borda_model->buscar();
        $mpdf = new mPDF();
        $html = $this->getHTMLConcentradores($dados);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    
        public function relatorioEquipamentos() {
        $dados = $this->equipamentos_model->buscar();
        $mpdf = new mPDF();
        $html = $this->getHTMLEquipamentos($dados);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    
            public function relatorioPops() {
        $dados = $this->pops_model->buscar();
        $mpdf = new mPDF();
        $html = $this->getHTMLPops($dados);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    
        public function relatorioUsuarios() {
        $dados = $this->user_model->buscar();
        $mpdf = new mPDF();
        $html = $this->getHTMLUsuarios($dados);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
        
        public function relatorioFuncionarios() {
        $dados = $this->funcionarios_model->buscar();
        $mpdf = new mPDF();
        $html = $this->getHTMLFuncionarios($dados);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    
    public function getHTMLClientes($dados) {
        $html = '<link rel="stylesheet" href="'.base_url('assets/bootstrap/css/bootstrap.min.css').'">';
        
        $html = $html.'<h2>Relatório de Clientes</h2>
  
                        <table id="tabela" class="table">
                            <thead>
                                <tr>
                                    <th>Código</th>
                <th>Nome</th>                
                <th>Endereco</th>             
                <th>Telefone</th>                
                <th>Email</th>  
                <th>Pops</th>  
                                </tr>
                            </thead>
                            <tbody>';
        foreach ($dados as $item) {
            $html = $html.'<tr>
                        <td>'.$item['id'].'</td>
                        <td>'.$item['nomecliente'].'</td>
                        <td>'.$item['enderecocliente'].'</td>
                        <td>'.$item['telefone'].'</td>
                        <td>'.$item['email'].'</td>
                        <td>'.$item['pops'].'</td>
                      
                    </tr>';
        }

        $html = $html.'</tbody>    
                    </table>';
        return $html;
    }
    
    public function getHTMLConcentradores($dados) {
        $html = '<link rel="stylesheet" href="'.base_url('assets/bootstrap/css/bootstrap.min.css').'">';
        
        $html = $html.'<h2>Relatório de Concentradores</h2>
  
                        <table id="tabela" class="table">
                            <thead>
                                <tr>
                <th>Código:</th>
                <th>Nome:</th>                
                <th>Classe de IPV4:</th>             
                <th>Data Instalação:</th>                
                <th>Pop:</th>  
                <th>Equipamento:</th>
                                </tr>
                            </thead>
                            <tbody>';
        foreach ($dados as $item) {
            $html = $html.'<tr>
                        <td>'.$item['idborda'].'</td>
                        <td>'.$item['nomeborda'].'</td>
                        <td>'.$item['descri'].'</td>
                        <td>'.$item['data'].'</td>
                        <td>'.$item['pops'].'</td>
                        <td>'.$item['equipamentos'].'</td>
                    </tr>';
        }

        $html = $html.'</tbody>    
                    </table>';
        return $html;
    }
    
        public function getHTMLEquipamentos($dados) {
        $html = '<link rel="stylesheet" href="'.base_url('assets/bootstrap/css/bootstrap.min.css').'">';
        
        $html = $html.'<h2>Relatório de Equipamentos</h2>
  
                        <table id="tabela" class="table">
                            <thead>
                                <tr>
               <th>Código:</th>
                <th>Nome:</th>
                <th>Data da Compra:</th>
                <th>Quantidade:</th>
                <th>Valor Unitário:</th>
                <th>Valor Total:</th>
                                </tr>
                            </thead>
                            <tbody>';
        foreach ($dados as $item) {
            $html = $html.'<tr>
                        <td>'.$item['idequipamentos'].'</td>
                        <td>'.$item['nomeequipamentos'].'</td>
                        <td>'.$item['datacompra'].'</td>
                        <td>'.$item['quantidade'].'</td>
                        <td>'.$item['valor_unitario'].'</td>
                        <td>'.$item['valor_unitario'] * $item['quantidade'].'</td>
                    </tr>';
        }

        $html = $html.'</tbody>    
                    </table>';
        return $html;
    }
            public function getHTMLPops($dados) {
        $html = '<link rel="stylesheet" href="'.base_url('assets/bootstrap/css/bootstrap.min.css').'">';
        
        $html = $html.'<h2>Relatório de Pops</h2>
  
                        <table id="tabela" class="table">
                            <thead>
                                <tr>
              <th>Código:</th>
                <th>Nome:</th>
                <th>Descrição:</th>
                <th>Endereço:</th>
                <th>Responsável Técnico:</th>
                <th>Voltagem:</th>
                <th>Acesso:</th>
                                </tr>
                            </thead>
                            <tbody>';
        foreach ($dados as $item) {
            $html = $html.'<tr>
                        <td>'.$item['idpops'].'</td>
                        <td>'.$item['nome'].'</td>
                        <td>'.$item['descricao'].'</td>
                        <td>'.$item['endereco'].'</td>
                        <td>'.$item['funcionarios'].'</td>
                        <td>'.$item['vol'].'</td>
                        <td>'.$item['acesso'].'</td>
                    </tr>';
        }

        $html = $html.'</tbody>    
                    </table>';
        return $html;
    }
    
     public function getHTMLUsuarios($dados) {
        $html = '<link rel="stylesheet" href="'.base_url('assets/bootstrap/css/bootstrap.min.css').'">';
        
        $html = $html.'<h2>Relatório de Usuários</h2>
  
                        <table id="tabela" class="table">
                            <thead>
                                <tr>
               <th>Código:</th>
                <th>E-mail</th>
                <th>Permissão:</th>
                                </tr>
                            </thead>
                            <tbody>';
        foreach ($dados as $item) {
            $html = $html.'<tr>
                        <td>'.$item['idusuario'].'</td>
                        <td>'.$item['email'].'</td>
                        <td>'.$item['permissao'].'</td>
                    </tr>';
        }

        $html = $html.'</tbody>    
                    </table>';
        return $html;
    }
    
         public function getHTMLFuncionarios($dados) {
        $html = '<link rel="stylesheet" href="'.base_url('assets/bootstrap/css/bootstrap.min.css').'">';
        
        $html = $html.'<h2>Relatório de Funcionários</h2>
  
                        <table id="tabela" class="table">
                            <thead>
                                <tr>
               <th>Código:</th>
                <th>Nome:</th>
                <th>Data da Admissão:</th>
                <th>Telefone:</th>
                <th>E-mail:</th>
                <th>Função:</th>
                                </tr>
                            </thead>
                            <tbody>';
        foreach ($dados as $item) {
            $html = $html.'<tr>
                        <td>'.$item['idfuncionarios'].'</td>
                        <td>'.$item['nomefuncionarios'].'</td>
                        <td>'.$item['data'].'</td>
                        <td>'.$item['telefone'].'</td>
                        <td>'.$item['email'].'</td>
                        <td>'.$item['funcao'].'</td>
                    </tr>';
        }

        $html = $html.'</tbody>    
                    </table>';
        return $html;
    }
}



