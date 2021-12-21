<?php
    class Account_setting {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getSettings($id) {
            $this->db->query("SELECT * FROM AdditionalSettings WHERE user_id = :user_id");
            // bind value
            $this->db->bind(":user_id", $id);

            $result = $this->db->single();

            return $result;
        }

        public function isUserLockedProfile($id) {
            $this->db->query('SELECT * FROM AdditionalSettings WHERE user_id = :user_id'); // this is a prepared statement
            // bind value
            $this->db->bind(":user_id", $id);

            $row = $this->db->single();

            // Check row - return true if email exists. Because then rowCount is not 0
            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        public function enableLockProfile($id) {
            $this->db->query('INSERT INTO AdditionalSettings(user_id, is_pri_gen_details_visible, is_pri_soc_details_visible) 
                                VALUES (:user_id, 0, 0)');
            // bind value
            $this->db->bind(":user_id", $id);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function toggleGeneralDetails($id, $x) {
            $this->db->query('UPDATE AdditionalSettings SET is_pri_gen_details_visible = :x WHERE user_id = :user_id');
            // bind values            
            $this->db->bind(":user_id", $id);
            $this->db->bind(":x", $x);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function toggleSocialDetails($id, $x) {
            $this->db->query('UPDATE AdditionalSettings SET is_pri_soc_details_visible = :x WHERE user_id = :user_id');
            // bind values            
            $this->db->bind(":user_id", $id);
            $this->db->bind(":x", $x);

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