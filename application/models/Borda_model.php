<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */


class Borda_model extends CI_Model{
    private $tabela;
    function __construct() {
        $this->tabela = 'borda';
    }
    
    public function buscar($id=NULL) {
        if($id){
            $query = $this->db->get_where($this->tabela, array('idborda'=>$id));
            return $query->row_array();
        }
        $this->db->select('idborda, borda.nomeborda, borda.descri, borda.data, nome as pops, nomeequipamentos as equipamentos ');
        $this->db->from($this->tabela);
        $this->db->join('pops', 'pops.idpops=borda.idpops');
        $this->db->join('equipamentos', 'equipamentos.idequipamentos=borda.idequipamentos');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function gravar($id=NULL) {
        $dados = $this->input->post();
        if($id){
            return $this->db->where('idborda',$id)->update($this->tabela,$dados);
        }
        return $this->db->insert($this->tabela, $dados);
    }
    
    public function excluir($id){
        return $this->db->where('idborda',$id)->delete($this->tabela);
    }
    
}
