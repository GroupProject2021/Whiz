<?php
    class Student {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register as a user
        public function registerAsAUser($data) {
            // register as a user    
            $this->db->query('INSERT INTO users(profile_image, name, email, password, actor_type, specialized_actor_type, status) VALUES(:profile_image, :name, :email, :password, :actor_type, :specialized_actor_type, :status)');
            // bind values
            $this->db->bind("profile_image", $data['profile_image_name']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Student');
            $this->db->bind(':specialized_actor_type', 'Beginner');
            $this->db->bind(':status', 'not verified');

            // Execute
            if($this->db->execute()) {
                // return true;
                return true;
            }
            else {
                return false;
            }
        }

        public function registerAsAStudent($id, $data) {
            // register as a student
            $this->db->query('INSERT INTO student(stu_id, name, address, gender, date_of_birth, email, phn_no) VALUES(:stu_id, :name, :address, :gender, :date_of_birth, :email, :phn_no)');
            // bind values
            $this->db->bind(":stu_id", $id);
            $this->db->bind(":name", $data['name']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":gender", $data['gender']);
            $this->db->bind(":date_of_birth", $data['date_of_birth']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":phn_no", $data['phn_no']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email) {
            // $this->db->query('SELECT * FROM student WHERE email = :email'); // this is a prepared statement
            $this->db->query('SELECT * FROM users WHERE email = :email'); // this is a prepared statement
            // bind value
            $this->db->bind(":email", $email);

            $row = $this->db->single();

            // Check row - return true if email exists. Because then rowCount is not 0
            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        // useful for initialized the beginner details using students
        public function findStudentIdbyEmail($email) {
            $this->db->query('SELECT * FROM student WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row->stu_id;
        }

        public function getUserIdByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row->id;
        }
    }
?>