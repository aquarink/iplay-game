<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Game_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function gameCheck($game_name, $id_category) {
        $sql = "SELECT * FROM tb_game WHERE game_name = '$game_name' AND id_category = '$id_category' AND game_status = '1'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function addGameModel($id_category, $game_name, $game_rename, $game_thumb, $game_cost, $game_status) {
        $createDate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO tb_game (id_category,game_name,game_rename,game_thumb,game_cost,game_status,game_create) "
                . "VALUES("
                . "" . $this->db->escape($id_category) . ", "
                . "" . $this->db->escape($game_name) . ", "
                . "" . $this->db->escape($game_rename) . ", "
                . "" . $this->db->escape($game_thumb) . ", "
                . "" . $this->db->escape($game_cost) . ", "
                . "" . $this->db->escape($game_status) . ", "
                . "" . $this->db->escape($createDate) . ")";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function gameByCount($gameStatus) {
        $sql = "SELECT * FROM tb_game,tb_category WHERE tb_game.id_category = tb_category.id_category AND game_status = '$gameStatus'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gameByStatus($gameStatus, $limit, $page) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM tb_game,tb_category WHERE tb_game.id_category = tb_category.id_category AND game_status = '$gameStatus' ORDER BY RAND() LIMIT $offset, $limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gameByCost($costStatus, $limit, $page) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM tb_game,tb_category WHERE tb_game.id_category = tb_category.id_category AND game_cost = '$costStatus' AND game_status = '1' ORDER BY RAND() LIMIT $offset, $limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gameByCategory($idCategory, $gameStatus, $limit, $page) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM tb_game,tb_category WHERE tb_game.id_category = tb_category.id_category AND tb_category.id_category = '$idCategory' AND game_status = '$gameStatus' ORDER BY RAND() LIMIT $offset, $limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gameBySearch($searchWord, $gameStatus, $limit, $page) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM tb_game,tb_category WHERE tb_game.id_category = tb_category.id_category AND tb_game.game_name LIKE '%$searchWord%' AND game_status = '$gameStatus' ORDER BY RAND() LIMIT $offset, $limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gameByUniq($idGame, $nameGame) {
        $sql = "SELECT * FROM tb_game,tb_category WHERE tb_game.id_category = tb_category.id_category AND id_game = '$idGame' AND game_rename = '$nameGame' AND game_status = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function changeStatus($status, $id) {
        $sql = "UPDATE tb_game SET game_status = '$status' WHERE id_game = '$id'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    public function gameTop() {
        $sql = "SELECT tb_game.game_name,tb_game.game_thumb,tb_game.game_rename,tb_category.category_name,tb_game_visit.id_game, COUNT(tb_game_visit.id_game)
            AS total
            FROM tb_game_visit,tb_game,tb_category
            WHERE tb_game_visit.id_game = tb_game.id_game AND tb_category.id_category = tb_game.id_category
            GROUP BY tb_game_visit.id_game
            ORDER BY total DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gamePage($limit, $page) {
        //function userCheck($usr, $pwd)
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM tb_game,tb_category WHERE tb_game.id_category = tb_category.id_category LIMIT $offset, $limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gameTotal() {
        $sql = "SELECT * FROM tb_game,tb_category WHERE tb_game.id_category = tb_category.id_category AND tb_game.game_status = '1'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function gameById($id) {
        $sql = "SELECT * FROM tb_game WHERE id_game = '$id' AND game_status = '1'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    ////////////// PROMO
    
    public function changeCostStatus($status, $id) {
        $sql = "UPDATE tb_game SET game_cost = '$status' WHERE id_game = '$id'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    public function gameCost() {
        $sql = "SELECT * FROM tb_game WHERE game_cost = '3' AND game_status = '1'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function changeAllCostStatus($status) {
        $sql = "UPDATE tb_game SET game_cost = '$status' ";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    public function gamePromo($costStatus) {
        $sql = "SELECT * FROM tb_game,tb_category WHERE game_cost = '$costStatus' AND tb_game.id_category = tb_category.id_category";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gamePagePromo($limit, $page) {
        //function userCheck($usr, $pwd)
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM tb_game,tb_category WHERE game_cost = '3' AND tb_game.id_category = tb_category.id_category LIMIT $offset, $limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gamePromoTotal() {
        $sql = "SELECT * FROM tb_game,tb_category WHERE game_cost = '3' AND tb_game.id_category = tb_category.id_category AND tb_game.game_status = '1'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function gameByCostStatus($costStatus, $limit, $page) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM tb_game,tb_category WHERE tb_game.id_category = tb_category.id_category AND game_cost = '$costStatus' ORDER BY RAND() LIMIT $offset, $limit";
        $query = $this->db->query($sql);
        return $query->result();
    }

}

?>
