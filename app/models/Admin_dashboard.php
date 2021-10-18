<?php
    class admin_dashboard {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM admin");
            return $results = $this->db->resultSet();
        }

        public function getadminDetails($id) {
            $this->db->query('SELECT * FROM Admin WHERE admins_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // useful for take a admin data from admins
        public function findAdminIdbyEmail($email) {
            $this->db->query('SELECT * FROM Admin WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $id = $row->admins_id;
            return $id;
        }

        // update settings for admin
        public function updateAdminSettings($id, $data) {
            $this->db->query('UPDATE Admin SET email = :email, password = :password 
            WHERE admin_id = :id');
            // bind values
            
            $this->db->bind(":email", $data['email']);
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