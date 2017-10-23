<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */


class Contratos_model extends CI_Model{
    private $tabela;
    function __construct() {
        $this->tabela = 'contratos';
    }
    
    public function buscar($id=NULL) {
        if($id){
            $query = $this->db->get_where($this->tabela, array('idcontratos'=>$id));
            return $query->row_array();
        }
        $this->db->select('idcontratos, contratos.situacao, nomecliente as cliente, nomeservicos as servicos ');
        $this->db->from($this->tabela);
        $this->db->join('cliente', 'cliente.id=contratos.idcliente');
        $this->db->join('servicos', 'servicos.idservicos=contratos.idservicos');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function gravar($id=NULL) {
        $dados = $this->input->post();
        if($id){
            return $this->db->where('idcontratos',$id)->update($this->tabela,$dados);
        }
        return $this->db->insert($this->tabela, $dados);
    }
    
    public function excluir($id){
        return $this->db->where('idcontratos',$id)->delete($this->tabela);
    }
    
}
