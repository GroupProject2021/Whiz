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

        // report
        public function sendReport($data) {
            $this->db->query('INSERT INTO Report(reported_id, reported_actor_type, reporter_id, reporter_actor_type, reporter_first_name, report) VALUES(:reported_id, :reported_actor_type, :reporter_id, :reporter_actor_type, :reporter_first_name, :report)');
            // bind values
            $this->db->bind(":reported_id", $data['reported_id']);
            $this->db->bind(":reported_actor_type", $data['reported_actor_type']);
            $this->db->bind(":reporter_id", $data['reporter_id']);
            $this->db->bind(":reporter_actor_type", $data['reporter_actor_type']);            
            $this->db->bind(":reporter_first_name", $data['reporter_first_name']);
            $this->db->bind(":report", $data['report']);
    
            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getIsReportedOrNnot($reportedId, $reporterId) {
            $this->db->query('SELECT * FROM Report WHERE reported_id = :reported_id AND reporter_id = :reporter_id'); // this is a prepared statement
            // bind value
            $this->db->bind(":reported_id", $reportedId);
            $this->db->bind(":reporter_id", $reporterId);

            $row = $this->db->single();

            // Check row - return true if email exists. Because then rowCount is not 0
            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    
?>