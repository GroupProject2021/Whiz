<?php
    class profileStatAndConnection {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // KEY IDEA - Social Connectivity using adjacency matrix mapping (many-to-many relationships)
        /*
            We know that adjacency matrix can be used to represent social connections (Learnet in DSA 2)
            But in MySQL we can't have such data structures, since its a structured query lannguage
            So I the solution is, we can use a table with 3 columns to represent this adjacency sort of a data structure

            ---------------------------------------------                               to
            | connection_id | from_suer_id | to_user_id |                       1       2       3
            ---------------------------------------------                       ---------------------------    
            |       1       |       3       |      2    |       <===        1 | null  |  1     |   null |    
            ---------------------------------------------                     ---------------------------    
            |       2       |       1       |      2    |             from  2 | null  |  null  |   1    |
            ---------------------------------------------                     ---------------------------    
            |       3       |       1       |      3    |                   3 | null  |  1     |   null |
            ---------------------------------------------                     ---------------------------    
        */ 

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

        public function removeFollower($me, $id) {
            $this->db->query('DELETE FROM  connections WHERE from_user_id = :me AND to_user_id = :id');
            // bind values
            $this->db->bind(":me", $me);
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