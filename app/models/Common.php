<?php
    class Common {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

         // Login user
         public function login($email, $password) {
            $this->db->query('SELECT * FROM Users WHERE email = :email');
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
            $this->db->query('SELECT * FROM Users WHERE email = :email'); // this is a prepared statement
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
            $this->db->query('SELECT * FROM Users WHERE id = :id'); // this is a prepared statement
            // bind value
            $this->db->bind(":id", $id);

            $row = $this->db->single();

            return $row;
        }       

        // set verify user
        public function setVerifiedUser($email) {
            $this->db->query('UPDATE Users SET status = "verified" WHERE email = :email');
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

        // reset old password to new
        public function resetPassword($email, $password) {
            $this->db->query('UPDATE Users SET password = :password WHERE email = :email');
            // bind values
            $this->db->bind(':password', $password);
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

    public function sendcomplaint($userid,$profileid) {
        $this->db->query('INSERT INTO Complaint(complaintsender_id, profile_id) VALUES(:complaintsender_id, :profile_id)');
        // bind values
        $this->db->bind(":complaintsender_id", $userid);
        $this->db->bind(":profile_id", $profile_id);

        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
            
    }
?>