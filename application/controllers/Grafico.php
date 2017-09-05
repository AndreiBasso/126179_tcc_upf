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

class Grafico extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) redirect ('login');
        $this->load->model('pops_model');
        $this->load->helper('url_helper');
    }
    
    public function index() {
        $dados['pops'] = $this->pops_model->buscar_acesso();
        $dados['vol'] = $this->pops_model->buscar_vol();
       // print_r($dados);
        $this->load->view('template/header');
        $this->load->view('grafico/index', $dados);
        $this->load->view('template/footer');
    }
}