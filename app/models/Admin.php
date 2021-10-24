<?php
    class Admin {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register as a user
        public function registerAsAUser($data) {
            // register as a user    
            $this->db->query('INSERT INTO Users(profile_image, first_name, email, password, actor_type, specialized_actor_type, status) VALUES(:profile_image, :name, :email, :password, :actor_type, :specialized_actor_type, :status)');
            // bind values
            $this->db->bind("profile_image", $data['profile_image_name']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Admin');
            $this->db->bind(':specialized_actor_type', 'Admin');
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

        public function registerAsAnAdmin($id, $data) {
            // register as a student
            $this->db->query('INSERT INTO Admin(admin_id, email, phone_number, user_role) VALUES(:admin_id, :email, :phn_no, :user_role)');
            // bind values
            $this->db->bind(":admin_id", $id);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":user_role", $data['user_role']);

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

        public function getUserIdByEmail($email) {
            $this->db->query('SELECT * FROM Users WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row->id;
        }

        public function isAdminExist($email) {
            $this->db->query('SELECT * FROM Users WHERE email = :email AND actor_type = "Admin" AND specialized_actor_type = "Admin"'); // this is a prepared statement
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

        // set verify admin
        public function setVerifiedAdmin($email) {
            $this->db->query('UPDATE Users SET status = "verified" WHERE email = :email AND actor_type = "Admin" AND specialized_actor_type = "Admin"');
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