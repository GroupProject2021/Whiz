<?php 

class M_M_Enrolment_List{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query("SELECT * FROM posts");
        $results = $this->db->resultSet();

        return $results;
    }
}


?>