<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visitor_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function addHitVisitor($ip_visitor, $id_game) {
        //$createDate = date('Y-m-d H:i:s');
        //$createDate = '2017-03-29 04:02:24';
        $sql = "INSERT INTO tb_game_visit (ip_visitor,id_game,date_visit) VALUES(" . $this->db->escape($ip_visitor) . ", " . $this->db->escape($id_game) . ", CURRENT_TIMESTAMP())";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function topGame() {
        $sql = "SELECT * ,COUNT(id_visit) AS hit, tb_game.id_game AS gameId, tb_game_visit.id_game AS gameVisId FROM tb_game INNER JOIN tb_game_visitON tb_game.id_game = tb_game_visit.id_game ORDER BY tb_game_visit.id_game DESC LIMIT 10";
        $query = $this->db->query($sql);
        return $query->result();
    }

}

?>
