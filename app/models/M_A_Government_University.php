<?php
    class M_A_Government_University {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // retrieves
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

        public function getUniversityById($id) {
            $this->db->query('SELECT * FROM GovermentUniversity WHERE gov_uni_id = :id');
            $this->db->bind(":id", $id);

            $row = $this->db->single();

            return $row;
        }

        public function getCourseById($id) {
            $this->db->query('SELECT * FROM GovernmentCourse WHERE gov_course_id = :id');
            $this->db->bind(":id", $id);

            $row = $this->db->single();

            return $row;
        }

        public function getCourseAndUniversityById($id) {
            $this->db->query('SELECT * FROM GovernmentCourseOfferedByGovermentUniversity WHERE id = :id');
            $this->db->bind(":id", $id);

            $row = $this->db->single();

            return $row;
        }


        // add
        public function addUniversity($data) {
            $this->db->query('INSERT INTO GovermentUniversity(uni_name, description, world_rank, student_amount, graduate_job_rate) VALUES(:uni_name, :description, :world_rank, :student_amount, :graduate_job_rate)');
            // bind values
            $this->db->bind(":uni_name", $data['uni_name']);
            $this->db->bind(":description", $data['description']);            
            $this->db->bind(":world_rank", $data['world_rank']);
            $this->db->bind(":student_amount", $data['student_amount']);
            $this->db->bind(":graduate_job_rate", $data['graduate_job_rate']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function addCourse($data) {
            $this->db->query('INSERT INTO GovernmentCourse(gov_course_id, gov_course_name) VALUES(:gov_course_id, :gov_course_name)');
            // bind values
            $this->db->bind(":gov_course_id", $data['course_id']);
            $this->db->bind(":gov_course_name", $data['course_name']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
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


        // edit
        public function editUniversity($data) {
            $this->db->query('UPDATE GovermentUniversity SET uni_name = :uni_name, description = :description, world_rank = :world_rank, student_amount = :student_amount, graduate_job_rate = :graduate_job_rate WHERE gov_uni_id = :id');
            // bind values
            $this->db->bind(":id", $data['id']);
            $this->db->bind(":uni_name", $data['uni_name']);
            $this->db->bind(":description", $data['description']);            
            $this->db->bind(":world_rank", $data['world_rank']);
            $this->db->bind(":student_amount", $data['student_amount']);
            $this->db->bind(":graduate_job_rate", $data['graduate_job_rate']);
            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function editCourse($data) {
            $this->db->query('UPDATE GovernmentCourse SET gov_course_id = :gov_course_id, gov_course_name = :gov_course_name WHERE gov_course_id = :id');
            // bind values
            $this->db->bind(":id", $data['id']);
            $this->db->bind(":gov_course_id", $data['course_id']);
            $this->db->bind(":gov_course_name", $data['course_name']);

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
        

        // delete
        public function deleteUniversity($id) {
            $this->db->query('DELETE FROM GovermentUniversity WHERE gov_uni_id = :id');
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

        public function deleteCourse($id) {
            $this->db->query('DELETE FROM GovernmentCourse WHERE gov_course_id = :id');
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