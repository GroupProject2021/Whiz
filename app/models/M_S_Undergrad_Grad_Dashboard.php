<?php

class M_S_Undergrad_Grad_Dashboard {
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

    public function getJobEnrollments() {
        $this->db->query("SELECT * FROM JobApplicants INNER JOIN Posts 
                            ON JobApplicants.post_id = Posts.id 
                            WHERE JobApplicants.user_id = :id AND JobApplicants.interaction = 'applied' ORDER BY JobApplicants.applied_date DESC");
        $this->db->bind(":id", $_SESSION['user_id']);

        $results = $this->db->resultSet();

        return $results;
    }
}

?>