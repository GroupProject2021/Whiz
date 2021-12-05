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

    public function getAssociatedGovUnisById($courseId) {
        $this->db->query('SELECT uni_name, unicode FROM v_gov_course_and_university WHERE gov_course_id = :gov_course_id');
        $this->db->bind(':gov_course_id', $courseId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCourseNameById($courseId) {
        $this->db->query('SELECT * FROM GovernmentCourse WHERE gov_course_id = :gov_course_id');
        $this->db->bind(':gov_course_id', $courseId);

        $results = $this->db->single();

        return $results->gov_course_name;
    }

    public function getGovUniversityList() {
        $this->db->query('SELECT * FROM GovermentUniversity');
        // $this->db->bind(':gov_course_id', $id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getGovCourseById($unicode) {
        $this->db->query('SELECT * FROM v_gov_course_and_university WHERE unicode = :unicode');
        $this->db->bind(':unicode', $unicode);

        $results = $this->db->single();

        return $results;
    }

    public function getTotalIntake() {
        $this->db->query('SELECT SUM(purposed_intake) AS total_intake FROM v_gov_course_and_university GROUP BY gov_course_name');

        $results = $this->db->single();

        return $results;
    }

    public function getUniDetails($uniName) {
        $this->db->query('SELECT * FROM GovermentUniversity WHERE  uni_name = :uni_name');
        $this->db->bind(':uni_name', $uniName);

        $results = $this->db->single();

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