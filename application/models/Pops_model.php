<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Pops_model extends CI_Model{
    private $tabela;
    function __construct() {
        $this->tabela = 'pops';
    }
    
   /* public function buscar($id=NULL) {
        if($id){
            $query = $this->db->get_where($this->tabela, array('idpops'=>$id));
            return $query->row_array();
        } else {
            $query = $this->db->get($this->tabela);
            return $query->result_array();
        }
    } */
    
        public function buscar($id=NULL) {
        if($id){
            $query = $this->db->get_where($this->tabela, array('idpops'=>$id));
            return $query->row_array();
        }
        $this->db->select('idpops, pops.nome, pops.descricao, pops.endereco, pops.vol, pops.acesso, nomefuncionarios as funcionarios');
        $this->db->from($this->tabela);
        $this->db->join('funcionarios', 'pops.idfuncionarios=funcionarios.idfuncionarios');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function buscar_acesso() {
        $this->db->select('count(idpops) as soma');
        $this->db->from($this->tabela);
        $this->db->group_by('acesso');
        $query = $this->db->get();
        return $query->result_array();
    }
       
        public function buscar_vol() {
        $this->db->select('count(idpops) as soma_vol');
        $this->db->from($this->tabela);
        $this->db->group_by('vol');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    public function delete($id) {
        return $this->db->where('idpops',$id)->delete($this->tabela);
    }
    
    public function gravar($id=NULL){
        $dados = $this->input->post();
        if($id){
            return $this->db->where('idpops',$id)->update($this->tabela,$dados);
        }else{
            return $this->db->insert($this->tabela, $dados);
        }
    }

}
