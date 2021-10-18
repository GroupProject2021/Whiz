<?php
    class Student_ProfileUpgrade {
        public function __construct() {
            $this->db = new Database;
        }

        public function registerOLqualified($stuId, $data) {
            // update user status
            $this->db->query('UPDATE Users SET specialized_actor_type = :specialized_actor_type WHERE id = :stuid');
            // bind values
            $this->db->bind(':specialized_actor_type', 'OL qualified');
            $this->db->bind(':stuid', $stuId);

            $this->db->execute();

            // take stu id
            $id = $this->findStudentIdbyEmail($_SESSION['user_email']);
            // register as a ol qualified student
            $this->db->query('INSERT INTO OLQualifiedStudent(stu_id, ol_school, ol_district, ol_sub1_id, ol_sub1_grade, ol_sub2_id, ol_sub2_grade,
                                 ol_sub3_id, ol_sub3_grade, ol_sub4_id, ol_sub4_grade, ol_sub5_id, ol_sub5_grade, ol_sub6_id, ol_sub6_grade,
                                 ol_sub7_id, ol_sub7_grade, ol_sub8_id, ol_sub8_grade, ol_sub9_id, ol_sub9_grade)
                                 VALUES (:stu_id, :ol_school, :ol_district, :ol_sub1_id, :ol_sub1_grade, :ol_sub2_id, :ol_sub2_grade,
                                 :ol_sub3_id, :ol_sub3_grade, :ol_sub4_id, :ol_sub4_grade, :ol_sub5_id, :ol_sub5_grade, :ol_sub6_id, :ol_sub6_grade,
                                 :ol_sub7_id, :ol_sub7_grade, :ol_sub8_id, :ol_sub8_grade, :ol_sub9_id, :ol_sub9_grade)');
            // bind values
            $this->db->bind(':stu_id', $id);
            $this->db->bind(':ol_school', $data['ol_school']);
            $this->db->bind(':ol_district', $data['ol_district']);
            $this->db->bind(':ol_sub1_id', $data['ol_sub1_id']);
            $this->db->bind(':ol_sub1_grade', $data['radio_religion']);
            $this->db->bind(':ol_sub2_id', $data['ol_sub2_id']);
            $this->db->bind(':ol_sub2_grade', $data['radio_primary_language']);
            $this->db->bind(':ol_sub3_id', $data['ol_sub3_id']);
            $this->db->bind(':ol_sub3_grade', $data['radio_secondary_language']);
            $this->db->bind(':ol_sub4_id', $data['ol_sub4_id']);
            $this->db->bind(':ol_sub4_grade', $data['radio_history']);
            $this->db->bind(':ol_sub5_id', $data['ol_sub5_id']);
            $this->db->bind(':ol_sub5_grade', $data['radio_science']);
            $this->db->bind(':ol_sub6_id', $data['ol_sub6_id']);
            $this->db->bind(':ol_sub6_grade', $data['radio_mathematics']);
            $this->db->bind(':ol_sub7_id', $data['ol_sub7_id']);
            $this->db->bind(':ol_sub7_grade', $data['radio_basket_1']);
            $this->db->bind(':ol_sub8_id', $data['ol_sub8_id']);
            $this->db->bind(':ol_sub8_grade', $data['radio_basket_2']);
            $this->db->bind(':ol_sub9_id', $data['ol_sub9_id']);
            $this->db->bind(':ol_sub9_grade', $data['radio_basket_3']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function registerALqualified($stuId, $data) {
            // update user status
            $this->db->query('UPDATE Users SET specialized_actor_type = :specialized_actor_type WHERE id = :stuid');
            // bind values
            $this->db->bind(':specialized_actor_type', 'AL qualified');
            $this->db->bind(':stuid', $stuId);

            $this->db->execute();

            /* Note that removing data is not necessary since tables are overlapping. But for the documentation i just leave here */
            /* This is how to perform DELETE */
            
            /*
            // take stu id
            $id = $this->findStudentIdbyEmail($_SESSION['user_email']);
            // remove the ol qualified student
            $this->db->query('DELETE FROM olqualifiedStudent WHERE stu_id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $this->db->execute();
            */


            // take stu id
            $id = $this->findStudentIdbyEmail($_SESSION['user_email']);
            // register as a al qualified student
            $this->db->query('INSERT INTO ALQualifiedStudent(stu_id, al_school, stream, z_score, al_district, al_general_test_grade, al_general_english_grade,
                                al_sub1_id, al_sub1_grade, al_sub2_id, al_sub2_grade, al_sub3_id, al_sub3_grade)
                                VALUES(:stu_id, :al_school, :stream, :z_score, :al_district, :al_general_test_grade, :al_general_english_grade,
                                :al_sub1_id, :al_sub1_grade, :al_sub2_id, :al_sub2_grade, :al_sub3_id, :al_sub3_grade)');
            // bind values
            $this->db->bind(':stu_id', $id);
            $this->db->bind(':al_school', $data['al_school']);
            $this->db->bind(':stream', $data['stream']);
            $this->db->bind(':z_score', $data['z_score']);
            $this->db->bind(':al_district', $data['al_district']);
            $this->db->bind(':al_general_test_grade', $data['general_test_grade']);
            $this->db->bind(':al_general_english_grade', $data['radio_general_english']);
            $this->db->bind(':al_sub1_id', $data['al_sub1_id']);
            $this->db->bind(':al_sub1_grade', $data['radio_subject_1']);
            $this->db->bind(':al_sub2_id', $data['al_sub2_id']);
            $this->db->bind(':al_sub2_grade', $data['radio_subject_2']);
            $this->db->bind(':al_sub3_id', $data['al_sub3_id']);
            $this->db->bind(':al_sub3_grade', $data['radio_subject_3']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function registerUndergraduateGraduate($stuId, $data) {
            // update user status
            $this->db->query('UPDATE Users SET specialized_actor_type = :specialized_actor_type WHERE id = :stuid');
            // bind values
            $this->db->bind(':specialized_actor_type', 'Undergraduate Graduate');
            $this->db->bind(':stuid', $stuId);

            $this->db->execute();


            // take stu id
            $id = $this->findStudentIdbyEmail($_SESSION['user_email']);
            // register as a undergraduate graduate
            $this->db->query('INSERT INTO UndergraduateGraduate(stu_id, degree, uni_type, uni_name, gpa) VALUES(:stu_id, :degree, :uni_type, :uni_name, :gpa)');
            //bind values
            $this->db->bind(':stu_id', $id);
            $this->db->bind(':degree', $data['degree']);
            $this->db->bind(':uni_type', $data['uni_type']);
            $this->db->bind(':uni_name', $data['uni_name']);
            $this->db->bind(':gpa', $data['gpa']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // useful for take a student data from students
        public function findStudentIdbyEmail($email) {
            $this->db->query('SELECT * FROM Student WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $id = $row->stu_id;
            return $id;
        }

        // to get the updated results of the student - i added this later
        public function getUpdatedSession($id) {
            $this->db->query('SELECT * FROM Users WHERE id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        // get districts 
        public function getDistricts() {
            $this->db->query("SELECT * FROM District");
            $results = $this->db->resultSet();

            return $results;
        }

        // get ol subjects 
        public function getOLSubjects() {
            $this->db->query("SELECT * FROM OLSubject");
            $results = $this->db->resultSet();

            return $results;
        }

        // get streams 
        public function getStreams() {
            $this->db->query("SELECT * FROM Stream");
            $results = $this->db->resultSet();

            return $results;
        }

        // get al subjects 
        public function getALSubjects() {
            $this->db->query("SELECT * FROM ALSubject");
            $results = $this->db->resultSet();

            return $results;
        }

        // get scool list
        public function getSchoolList($search) {
            $this->db->query("SELECT * FROM School WHERE name LIKE '".$search."%'");
            // bind values
            // $this->db->bind(':search', $search);

            $results = $this->db->resultSet();

            return $results;
        }

        // get university list
        public function getUniversityList($search) {
            $this->db->query("SELECT * FROM GovermentUniversity WHERE uni_name LIKE '".$search."%'");
            // bind values
            // $this->db->bind(':search', $search);

            $results = $this->db->resultSet();

            return $results;
        }

        // get university list
        public function getDegreeList($search) {
            $this->db->query("SELECT * FROM GovernmentCourse WHERE gov_course_name LIKE '".$search."%'");
            // bind values
            // $this->db->bind(':search', $search);

            $results = $this->db->resultSet();

            return $results;
        }
    }
?>