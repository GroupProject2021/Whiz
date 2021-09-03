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

        // update setting for beginnner
        public function updateStudentSettings($id, $data) {
            $this->db->query('UPDATE student SET name = :name, address = :address, gender = :gender,
                                date_of_birth = :date_of_birth, email = :email, phn_no = :phn_no, password = :password
                                 WHERE stu_id = :id');
            // bind values
            
            $this->db->bind(":name", $data['name']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":gender", $data['gender']);
            $this->db->bind(":date_of_birth", $data['date_of_birth']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":password", $data['password']);
            $this->db->bind(":id", $id);

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