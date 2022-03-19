<?php

class M_O_University_Dashboard {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUniversityCoursesAmount() {
        $this->db->query('SELECT * FROM PrivateCourses WHERE private_uni_id = :id'); // this is a prepared statement
        $this->db->bind(":id", $_SESSION['user_id']);

        $row = $this->db->single();

        // Check row - return true if email exists. Because then rowCount is not 0
        $amount = $this->db->rowCount();
        if($amount > 0) {
            return $amount;
        }
        else {
            return false;
        }
    }

    public function getIntakeNoticesAmount() {
        $this->db->query('SELECT * FROM IntakeNotices WHERE private_uni_id = :id'); // this is a prepared statement
        $this->db->bind(":id", $_SESSION['user_id']);

        $row = $this->db->single();

        // Check row - return true if email exists. Because then rowCount is not 0
        $amount = $this->db->rowCount();
        if($amount > 0) {
            return $amount;
        }
        else {
            return false;
        }
    }
}

?>