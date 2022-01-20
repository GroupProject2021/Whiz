<?php

class M_S_AL_Qualified_Dashboard {
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

    public function getTeacherEnrollments() {
        $this->db->query("SELECT * FROM TeacherEnrollments INNER JOIN Posts 
                            ON TeacherEnrollments.post_id = Posts.id 
                            WHERE TeacherEnrollments.user_id = :id AND TeacherEnrollments.interaction = 'applied'  ORDER BY TeacherEnrollments.applied_date DESC");
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

    // notices
    public function getNotices() {
        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                            ON v_posts_notices.private_uni_id = Connections.to_user_id
                            WHERE Connections.from_user_id = :id LIMIT 5");
        $this->db->bind(":id", $_SESSION['user_id']);

        $results = $this->db->resultSet();

        return $results;
    }
}

?>