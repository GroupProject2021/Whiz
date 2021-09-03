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

        public function getStudentDetails($id) {
            $this->db->query('SELECT * FROM student WHERE stu_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getStudentOLDetails($id) {
            $this->db->query('SELECT * FROM olqualifiedstudent WHERE stu_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getStudentALDetails($id) {
            $this->db->query('SELECT * FROM alqualifiedstudent WHERE stu_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getStudentUniversity($id) {
            $this->db->query('SELECT * FROM undergraduategraduate WHERE stu_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // useful for take a student data from students
        public function findStudentIdbyEmail($email) {
            $this->db->query('SELECT * FROM student WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $id = $row->stu_id;
            return $id;
        }
    }
?>