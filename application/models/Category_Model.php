<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function categoryCheck($category_name) {
        $sql = "SELECT * FROM tb_category WHERE category_name = '$category_name'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function addCategoryModel($category_name, $category_status) {
        $createDate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO tb_category (category_name,category_status,category_create) VALUES(" . $this->db->escape($category_name) . ", " . $this->db->escape($category_status) . ", " . $this->db->escape($createDate) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function updateCategoryModel($category_name, $category_status, $id) {
        $sql = "UPDATE tb_category SET category_name = '$category_name', category_status = '$category_status' WHERE id_category = '$id'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function categoryAll() {
        $sql = "SELECT * FROM tb_category WHERE category_status = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function categoryByStatus($categoryStatus) {
        $sql = "SELECT * FROM tb_category WHERE category_status = '$categoryStatus'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function categoryByUniq($idCategory, $nameCategory) {
        $sql = "SELECT * FROM tb_category WHERE id_category = '$idCategory' AND category_name = '$nameCategory'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function categoryId($id) {
        $sql = "SELECT * FROM tb_category WHERE id_category = '$id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function categoryDis() {
        $sql = "SELECT DISTINCT(tb_category.`category_name`), tb_category.`id_category` FROM tb_game, tb_category WHERE tb_game.`id_category` = tb_category.`id_category`";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function categoryPage($limit, $page) {
    //function userCheck($usr, $pwd)
        $offset = ($page - 1) * $limit;
        $sql ="SELECT * FROM tb_category LIMIT $offset, $limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function categoryTotal() {
        $sql ="SELECT * FROM tb_category";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

}

?>
