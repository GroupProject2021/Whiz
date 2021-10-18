<?php

class M_S_Course {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getGovCourseList() {
        $this->db->query('SELECT * FROM GovernmentCourse');
        // $this->db->bind(':gov_course_id', $id);

        $results = $this->db->resultSet();

        return $results;
    }
}

?>