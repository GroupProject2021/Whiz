<?php

class M_S_Beginner_Dashboard {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getProfGuiderEnrollments() {
        $this->db->query("SELECT * FROM ProfGuiderEnrollments INNER JOIN Posts 
                            ON ProfGuiderEnrollments.post_id = Posts.id 
                            WHERE ProfGuiderEnrollments.user_id = :id AND ProfGuiderEnrollments.interaction = 'applied' ORDER BY ProfGuiderEnrollments.applied_date DESC");
        $this->db->bind(":id", $_SESSION['user_id']);

        $results = $this->db->resultSet();

        return $results;
    }


    public function getGovCourseAmount() {
        $this->db->query('SELECT * FROM GovernmentCourse'); // this is a prepared statement

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

    public function getPriCourseAmount() {
        $this->db->query('SELECT * FROM PrivateCourses'); // this is a prepared statement

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