<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM user");
            return $results = $this->db->resultSet();
        }
    }
?>