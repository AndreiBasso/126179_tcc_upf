<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */


class Orcamento_model extends CI_Model{
    private $tabela;
    function __construct() {
        $this->tabela = 'orcamento';
    }
    
    public function buscar($id=NULL) {
        if($id){
            $query = $this->db->get_where($this->tabela, array('idorcamento'=>$id));
            return $query->row_array();
        }
        $this->db->select('idorcamento, orcamento.situacao,orcamento.valor,orcamento.descricao, nomecliente as cliente, email as cliente_email, '
                . 'telefone as cliente_telefone, '
                . 'nomeservicos as servicos ');
        $this->db->from($this->tabela);
        $this->db->join('cliente', 'cliente.id=orcamento.idcliente');
        $this->db->join('servicos', 'servicos.idservicos=orcamento.idservicos');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function gravar($id=NULL) {
        $dados = $this->input->post();
        if($id){
            return $this->db->where('idorcamento',$id)->update($this->tabela,$dados);
        }
        return $this->db->insert($this->tabela, $dados);
    }
    
    public function excluir($id){
        return $this->db->where('idorcamento',$id)->delete($this->tabela);
    }
    
}
