<?php
    class M_A_Government_University {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getUniversities() {
            $this->db->query("SELECT * FROM GovermentUniversity");
            $results = $this->db->resultSet();
    
            return $results;
        }

        public function getCourses() {
            $this->db->query("SELECT * FROM GovernmentCourse");
            $results = $this->db->resultSet();
    
            return $results;
        }

        public function getCourseAndUniversities() {
            $this->db->query("SELECT * FROM v_gov_course_and_university");
            $results = $this->db->resultSet();
    
            return $results;
        }
        public function getCourseAndUniversityById($id) {
            $this->db->query('SELECT * FROM GovernmentCourseOfferedByGovermentUniversity WHERE id = :id');
            $this->db->bind(":id", $id);

            $row = $this->db->single();

            return $row;
        }

        public function addCourseUniversity($data) {
            $this->db->query('INSERT INTO GovernmentCourseOfferedByGovermentUniversity(gov_course_id, gov_uni_id, purposed_intake, duration, description, unicode) VALUES(:gov_course_id, :gov_uni_id, :purposed_intake, :duration, :description, :unicode)');
            // bind values
            $this->db->bind(":gov_course_id", $data['course']);
            $this->db->bind(":gov_uni_id", $data['university']);            
            $this->db->bind(":unicode", $data['unicode']);
            $this->db->bind(":purposed_intake", $data['purposed_intake']);
            $this->db->bind(":duration", $data['duration']);
            $this->db->bind(":description", $data['description']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function editCourseUniversity($data) {
            $this->db->query('UPDATE GovernmentCourseOfferedByGovermentUniversity SET gov_course_id = :gov_course_id, gov_uni_id = :gov_uni_id, purposed_intake = :purposed_intake, duration = :duration, description = :description, unicode = :unicode WHERE id = :id');
            // bind values
            $this->db->bind(":id", $data['id']);
            $this->db->bind(":gov_course_id", $data['course']);
            $this->db->bind(":gov_uni_id", $data['university']);
            $this->db->bind(":unicode", $data['unicode']);
            $this->db->bind(":purposed_intake", $data['purposed_intake']);
            $this->db->bind(":duration", $data['duration']);
            $this->db->bind(":description", $data['description']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteCourseUniversity($id) {
            $this->db->query('DELETE FROM GovernmentCourseOfferedByGovermentUniversity WHERE id = :id');
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