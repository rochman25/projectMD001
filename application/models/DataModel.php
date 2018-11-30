<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataModel
 *
 * @author zaenur
 */
class DataModel extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function select($col){
        $query = $this->db->select($col);
        return $query;
    }
    
    function getWhere($col,$kon){
        $query = $this->db->where($col,$kon);
        return $query;
    }
    
    function getData($table){
        $query = $this->db->get($table);
        return $query;
    }

    function update($table,$data) {
        $query = $this->db->update($table, $data);
        return $query;
    }
    
    function Login($table, $where) {
        return $this->db->get_where($table, $where);
    }
    
}
