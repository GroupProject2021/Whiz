<?php
    class Student_dashboard {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM student");
            return $results = $this->db->resultSet();
        }
    }
?>