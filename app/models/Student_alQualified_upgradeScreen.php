<?php
    class Student_alQualified_upgradeScreen {
        public function __construct() {
            $this->db = new Database;
        }

        public function register($data) {
            $this->db->query('INSERT INTO alqualifiedStudent(stu_id, al_school, stream, z_score, district, al_general_test_grade, al_general_english_grade,
                                al_sub1_id, al_sub1_grade, al_sub2_id, al_sub2_grade, al_sub3_id, al_sub3_grade)
                                VALUES(:stu_id, :al_school, :stream, :z_score, :district, :al_general_test_grade, :al_general_english_grade,
                                :al_sub1_id, :al_sub1_grade, :al_sub2_id, :al_sub2_grade, :al_sub3_id, :al_sub3_grade)');
            
            $this->db->bind(':stu_id', 1);
            $this->db->bind(':al_school', $data['al_school']);
            $this->db->bind(':stream', $data['stream']);
            $this->db->bind(':z_score', $data['z_score']);
            $this->db->bind(':district', $data['al_district']);
            $this->db->bind(':al_general_test_grade', $data['general_test_grade']);
            $this->db->bind(':al_general_english_grade', $data['general_english_grade']);
            $this->db->bind(':al_sub1_id', 1);
            $this->db->bind(':al_sub1_grade', 'A');
            $this->db->bind(':al_sub2_id', 2);
            $this->db->bind(':al_sub2_grade', 'A');
            $this->db->bind(':al_sub3_id', 3);
            $this->db->bind(':al_sub3_grade', 'A');

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