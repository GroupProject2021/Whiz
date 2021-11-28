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

    public function getGovUniversityList() {
        $this->db->query('SELECT * FROM GovermentUniversity');
        // $this->db->bind(':gov_course_id', $id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getRecommendedGovCourseList($districtName, $streamId, $zScore) {
        $this->db->query('SELECT * FROM v_zscore_table WHERE district_name = :district_name AND stream_id = :stream_id AND z_score != -1 AND z_score <= :z_score ORDER BY z_score DESC LIMIT 10');
        $this->db->bind(':district_name', $districtName);
        $this->db->bind(':stream_id', $streamId);
        $this->db->bind(':z_score', $zScore);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getAdmissibleGovCourseList($districtName, $streamId) {
        $this->db->query('SELECT * FROM v_zscore_table WHERE district_name = :district_name AND stream_id = :stream_id AND z_score != -1 ORDER BY z_score DESC');
        $this->db->bind(':district_name', $districtName);
        $this->db->bind(':stream_id', $streamId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getStudentDistrict($id) {
        $this->db->query('SELECT al_district FROM ALQualifiedStudent WHERE stu_id = :id');
        $this->db->bind(':id', $id);

        $results = $this->db->single();

        return $results->al_district;
    }

    public function getStudentStream($id) {
        $this->db->query('SELECT stream FROM ALQualifiedStudent WHERE stu_id = :id');
        $this->db->bind(':id', $id);

        $results = $this->db->single();

        return $results->stream;
    }

    public function getStudentZScore($id) {
        $this->db->query('SELECT z_score FROM ALQualifiedStudent WHERE stu_id = :id');
        $this->db->bind(':id', $id);

        $results = $this->db->single();

        return $results->z_score;
    }
}

?>