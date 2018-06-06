<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function reportCheck($date_cr_report) {
        $sql = "SELECT * FROM tb_pin WHERE pin_request_date = " . $this->db->escape($date_cr_report) . "";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function reportExistCheck($date_cr_report) {
        $sql = "SELECT * FROM tb_report  WHERE date_cr_report  = " . $this->db->escape($date_cr_report) . "";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function addReport($daily, $weekly, $monthly, $cost_daily, $cost_weekly, $cost_monthly, $date_cr_report) {
        $sql = "INSERT INTO tb_report (daily,weekly,monthly,cost_daily,cost_weekly,cost_monthly,date_cr_report) "
                . "VALUES(" . $this->db->escape($daily) . ", "
                . "" . $this->db->escape($weekly) . ", "
                . "" . $this->db->escape($monthly) . ", "
                . "" . $this->db->escape($cost_daily) . ", "
                . "" . $this->db->escape($cost_weekly) . ", "
                . "" . $this->db->escape($cost_monthly) . ", "
                . "" . $this->db->escape($date_cr_report) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function updateSubDaily($date, $plusSub, $cost) {
        $sql = "UPDATE tb_report SET daily = '$plusSub', cost_daily = '$cost' WHERE date_cr_report = '$date'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function updateSubWeekly($date, $plusSub, $cost) {
        $sql = "UPDATE tb_report SET weekly = '$plusSub', cost_weekly = '$cost' WHERE date_cr_report = '$date'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function updateSubMonthly($date, $plusSub, $cost) {
        $sql = "UPDATE tb_report SET monthly = '$plusSub', cost_monthly = '$cost' WHERE date_cr_report = '$date'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function reportViewAll() {
        $sql = "SELECT * FROM tb_report";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function reportViewByDate($start, $end) {
        $sql = "SELECT * FROM tb_report WHERE date_cr_report >= '$start' AND date_cr_report <= '$end'";
        $query = $this->db->query($sql);
        return $query->result();
    }

}

?>
