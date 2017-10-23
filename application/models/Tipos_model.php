<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */



class Tipos_model extends CI_Model{
    private $tabela;
    function __construct() {

        $this->tabela = 'tipos';
    }
    
    public function buscar($id=NULL) {
        if($id){
            $query = $this->db->get_where($this->tabela, array('idtipos'=>$id));
            return $query->row_array();
        } else {
            $query = $this->db->get($this->tabela);
            return $query->result_array();
        }
    }
    
    public function delete($id) {
        return $this->db->where('idtipos',$id)->delete($this->tabela);
    }
    
    public function gravar($id=NULL){
        $dados = $this->input->post();
        if($id){
            return $this->db->where('idtipos',$id)->update($this->tabela,$dados);
        }else{
            return $this->db->insert($this->tabela, $dados);
        }
    }

}
