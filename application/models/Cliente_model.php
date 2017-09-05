<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Cliente_model extends CI_Model{
    private $tabela;
    function __construct() {
        $this->tabela = 'cliente';
    }
    
    public function buscar($id=NULL) {
        if($id){
            $query = $this->db->get_where($this->tabela, array('id'=>$id));
            return $query->row_array();
        }
        $this->db->select('id, cliente.nomecliente, cliente.enderecocliente, cliente.telefone, cliente.email, nome as pops');
        $this->db->from($this->tabela);
        $this->db->join('pops', 'pops.idpops=cliente.idpops');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function gravar($id=NULL) {
        $dados = $this->input->post();
        if($id){
            return $this->db->where('id',$id)->update($this->tabela,$dados);
        }
        return $this->db->insert($this->tabela, $dados);
    }
    
    public function excluir($id){
        return $this->db->where('id',$id)->delete($this->tabela);
    }
    
}
