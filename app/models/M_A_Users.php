<?php
    class M_A_Users {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getReports() {

            $this->db->query("SELECT * FROM Report ORDER BY reporter_first_name");
            

            $results = $this->db->resultSet();

            return $results;
        }

        public function deleteReportedAccount($id) {
            $this->db->query('DELETE FROM Users WHERE id = :id');
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
    }
?>