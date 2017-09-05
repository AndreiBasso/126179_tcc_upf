<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Usuario_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function validaUsuario($dados) {
        $valida = array('email'=>$dados['email'],
            'senha'=>md5($dados['senha']));
                
        $query = $this->db->get_where('usuario', $valida);
        
        if($query->num_rows()==1) return $query->row_array();
        return false;
    }
}
