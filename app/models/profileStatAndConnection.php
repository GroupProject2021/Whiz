<?php
    class profileStatAndConnection {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function addFollower($from_id, $to_id) {
            $this->db->query('INSERT INTO connections(from_user_id, to_user_id) VALUES(:from_user_id, :to_user_id)');
            // bind values
            $this->db->bind(":from_user_id", $from_id);
            $this->db->bind(":to_user_id", $to_id);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function removeFollower($id) {
            $this->db->query('DELETE FROM  connections WHERE from_user_id = :id');
            // bind values
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getFollowerCount($id) {
            $this->db->query('SELECT * FROM connections WHERE to_user_id = :id');
            // bind values
            $this->db->bind(":id", $id);

            $this->db->single();
            
            $result = $this->db->rowCount();

            return $result;
        }
    }
?>