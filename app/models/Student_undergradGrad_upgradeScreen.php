<?php
    class Student_undergradGrad_upgradeScreen {
        public function __construct() {
            $this->db = new Database;
        }

        public function register($data) {
            $this->db->query('INSERT INTO undergraduategraduate(stu_id, degree, uni_name, gpa) VALUES(:stu_id, :degree, :uni_name, :gpa)');
            
            $this->db->bind(':stu_id', 1);
            $this->db->bind(':degree', $data['degree']);
            $this->db->bind(':uni_name', $data['uni_name']);
            $this->db->bind(':gpa', $data['gpa']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
    }
?>