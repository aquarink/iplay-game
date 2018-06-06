<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function userCheck($username,$password) {
        $sql = "SELECT * FROM tb_admin WHERE username = ".$this->db->escape($username)." AND password = ".$this->db->escape($password)."";
        $query = $this->db->query($sql);
        return $query->result();
    }
}

?>
