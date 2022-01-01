<?php
    class Payment {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // for payments
        public function getUserDetailsForPayments($id) {
            $this->db->query('SELECT * FROM Users WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }        

        public function getCities() {
            $this->db->query("SELECT city_name FROM City");            

            $results = $this->db->resultSet();

            return $results;
        }

        // get actor type detials for payments
        public function getMentorDetailsForPayments($id) {
            $this->db->query('SELECT * FROM Mentor WHERE mentor_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getOrganizationDetailsForPayments($id) {
            $this->db->query('SELECT * FROM Organization WHERE org_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
        
        // payment completed
        public function recordPaymentAsCompleted($postId) {
            $this->db->query('UPDATE Posts SET payed = 1 WHERE id = :id');
            // bind values
            $this->db->bind(":id", $postId);

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