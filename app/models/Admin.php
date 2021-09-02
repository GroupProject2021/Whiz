<?php
    class Admin {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        // Login user
        public function login($email, $password) {
            $this->db->query('SELECT * FROM admin WHERE email = :email');
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


        
    }
?>