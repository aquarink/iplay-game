<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function sendMessage($reason, $email, $subject, $message, $date_cr_mes, $status_mes) {
        $createDate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO tb_message (reason,email,subject,message,date_cr_mes,status_mes) VALUES("
                . "" . $this->db->escape($reason) . ", "
                . "" . $this->db->escape($email) . ", "
                . "" . $this->db->escape($subject) . ", "
                . "" . $this->db->escape($message) . ", "
                . "" . $this->db->escape($date_cr_mes) . ", "
                . "" . $this->db->escape($status_mes) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

}
