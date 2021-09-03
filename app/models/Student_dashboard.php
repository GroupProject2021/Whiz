<?php
    class Student_dashboard {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM student");
            return $results = $this->db->resultSet();
        }

        public function getStudentDetails($id) {
            $this->db->query('SELECT * FROM student WHERE stu_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getStudentOLDetails($id) {
            $this->db->query('SELECT * FROM olqualifiedstudent WHERE stu_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getStudentALDetails($id) {
            $this->db->query('SELECT * FROM alqualifiedstudent WHERE stu_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getStudentUniversity($id) {
            $this->db->query('SELECT * FROM undergraduategraduate WHERE stu_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // useful for take a student data from students
        public function findStudentIdbyEmail($email) {
            $this->db->query('SELECT * FROM student WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $id = $row->stu_id;
            return $id;
        }

        // update settings for beginnner
        public function updateStudentSettings($id, $data) {
            $this->db->query('UPDATE student SET name = :name, address = :address, gender = :gender,
                                date_of_birth = :date_of_birth, email = :email, phn_no = :phn_no, password = :password
                                 WHERE stu_id = :id');
            // bind values
            
            $this->db->bind(":name", $data['name']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":gender", $data['gender']);
            $this->db->bind(":date_of_birth", $data['date_of_birth']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":password", $data['password']);
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // update setting for ol qualified
        public function updateStudentOLSettings($id, $data) {
            $this->db->query('UPDATE olqualifiedstudent SET ol_school = :ol_school, ol_district = :ol_district, ol_sub1_grade = :ol_sub1_grade,
                                ol_sub2_grade = :ol_sub2_grade, ol_sub3_grade = :ol_sub3_grade, ol_sub4_grade = :ol_sub4_grade, ol_sub5_grade = :ol_sub5_grade,
                                ol_sub6_grade = :ol_sub6_grade, ol_sub7_grade = :ol_sub7_grade, ol_sub8_grade = :ol_sub8_grade, ol_sub9_grade = :ol_sub9_grade
                                 WHERE stu_id = :id');
            // bind values
            
            $this->db->bind(":ol_school", $data['ol_school']);
            $this->db->bind(":ol_district", $data['ol_district']);
            $this->db->bind(":ol_sub1_grade", $data['ol_sub1_grade']);
            $this->db->bind(":ol_sub2_grade", $data['ol_sub2_grade']);
            $this->db->bind(":ol_sub3_grade", $data['ol_sub3_grade']);
            $this->db->bind(":ol_sub4_grade", $data['ol_sub4_grade']);
            $this->db->bind(":ol_sub5_grade", $data['ol_sub5_grade']);
            $this->db->bind(":ol_sub6_grade", $data['ol_sub6_grade']);
            $this->db->bind(":ol_sub7_grade", $data['ol_sub7_grade']);
            $this->db->bind(":ol_sub8_grade", $data['ol_sub8_grade']);
            $this->db->bind(":ol_sub9_grade", $data['ol_sub9_grade']);
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // update setting for al qualified
        public function updateStudentALSettings($id, $data) {
            $this->db->query('UPDATE alqualifiedstudent SET al_school = :al_school, stream = :stream, z_score = :z_score,
                                al_district = :al_district, al_general_test_grade = :al_general_test_grade, al_general_english_grade = :al_general_english_grade, 
                                al_sub1_grade = :al_sub1_grade, al_sub2_grade = :al_sub2_grade, al_sub3_grade = :al_sub3_grade
                                 WHERE stu_id = :id');
            // bind values
            
            $this->db->bind(":al_school", $data['al_school']);
            $this->db->bind(":stream", $data['stream']);
            $this->db->bind(":z_score", $data['z_score']);
            $this->db->bind(":al_district", $data['al_district']);
            $this->db->bind(":al_general_test_grade", $data['al_general_test_grade']);
            $this->db->bind(":al_general_english_grade", $data['al_general_english_grade']);
            $this->db->bind(":al_sub1_grade", $data['al_sub1_grade']);
            $this->db->bind(":al_sub2_grade", $data['al_sub2_grade']);
            $this->db->bind(":al_sub3_grade", $data['al_sub3_grade']);
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // update setting for undergraduate graduate
        public function updateStudentUGSettings($id, $data) {
            $this->db->query('UPDATE undergraduategraduate SET degree = :degree, uni_name = :uni_name, gpa = :gpa
                                 WHERE stu_id = :id');
            // bind values
            
            $this->db->bind(":degree", $data['degree']);
            $this->db->bind(":uni_name", $data['uni_name']);
            $this->db->bind(":gpa", $data['gpa']);
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