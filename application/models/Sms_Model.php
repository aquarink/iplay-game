<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sms_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function pinCheck($pin, $request_by) {
        $sql = "SELECT * FROM tb_pin WHERE pin = " . $this->db->escape($pin) . " AND request_by = " . $this->db->escape($request_by) . "";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function addSmsRequestPin($pin, $request_by, $pin_request_date, $pin_valid_date, $type, $cost, $token, $status_pin) {
        $sql = "INSERT INTO tb_pin (pin,request_by,pin_request_date,pin_valid_date,type,cost,token,status_pin) "
                . "VALUES(" . $this->db->escape($pin) . ", "
                . "" . $this->db->escape($request_by) . ", "
                . "" . $this->db->escape($pin_request_date) . ", "
                . "" . $this->db->escape($pin_valid_date) . ", "
                . "" . $this->db->escape($type) . ", "
                . "" . $this->db->escape($cost) . ", "
                . "" . $this->db->escape($token) . ", "
                . "" . $this->db->escape($status_pin) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function subscriberAll($type) {
        $sql = "SELECT * FROM tb_pin WHERE type = " . $this->db->escape($type) . "";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function subscribeToday($type) {
        $sql = "SELECT type, DATE_FORMAT(pin_request_date, '%Y-%m-%d') AS now_date FROM tb_pin WHERE type = " . $this->db->escape($type) . " AND DATE(pin_request_date) = CURDATE()";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function subscribeYesterday($type) {
        $sql = "SELECT TYPE, DATE_FORMAT(pin_request_date, '%Y-%m-%d') AS now_date FROM tb_pin WHERE type = " . $this->db->escape($type) . " AND pin_request_date >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND pin_request_date < CURDATE()";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function subscribeWeek($type) {
        $sql = "SELECT type,DATE_FORMAT(pin_request_date, '%Y-%m-%d') AS now_date FROM tb_pin WHERE type = " . $this->db->escape($type) . " AND pin_request_date BETWEEN ADDDATE(NOW(),-7) AND NOW()";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function subscribeMonth($type) {
        $sql = "SELECT  type, DATE_FORMAT(pin_request_date, '%m/%d/%Y') AS now_date FROM tb_pin WHERE type = " . $this->db->escape($type) . " AND pin_request_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";
        $query = $this->db->query($sql);
        return $query->result();
    }
    

}

?>
