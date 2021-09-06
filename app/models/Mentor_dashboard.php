<?php
    class Mentor_dashboard{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // // get student details
        public function getPosts() {
            $this->db->query("SELECT * FROM mentor");
            return $results = $this->db->resultSet();
        }
    }
?>