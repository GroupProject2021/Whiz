<?php
    class Common {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

         // Login user
         public function login($email, $password) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)) {
                return $row;
            }
            else {
                return false;
            }
        }


        // Find user by email
        public function findUserByEmail($email) {
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

        // Get user by id
        public function getUserById($id) {
            $this->db->query('SELECT * FROM users WHERE id = :id'); // this is a prepared statement
            // bind value
            $this->db->bind(":id", $id);

            $row = $this->db->single();

            return $row;
        }       

        // set verify user
        public function setVerifiedUser($email) {
            $this->db->query('UPDATE users SET status = "verified" WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

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