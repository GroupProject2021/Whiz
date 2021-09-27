<?php

class M_S_Settings {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // get student details
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

    // get subject details
    public function getOLSubjectName($id) {
        $this->db->query('SELECT * FROM olsubject WHERE ol_sub_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row->ol_sub_name;
    }

    public function getALSubjectName($id) {
        $this->db->query('SELECT * FROM alsubject WHERE al_sub_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row->al_sub_name;
    }

    // get user details
    public function getUserDetails($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
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
                            date_of_birth = :date_of_birth, email = :email, phn_no = :phn_no
                             WHERE stu_id = :id');
        // bind values
        
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":address", $data['address']);
        $this->db->bind(":gender", $data['gender']);
        $this->db->bind(":date_of_birth", $data['date_of_birth']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":phn_no", $data['phn_no']);
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
        $this->db->query('UPDATE olqualifiedstudent SET ol_school = :ol_school, ol_district = :ol_district, ol_sub1_id = :ol_sub1_id, ol_sub1_grade = :ol_sub1_grade,
                            ol_sub2_id = :ol_sub2_id, ol_sub2_grade = :ol_sub2_grade, ol_sub3_id = :ol_sub3_id, ol_sub3_grade = :ol_sub3_grade,
                            ol_sub4_id = :ol_sub4_id, ol_sub4_grade = :ol_sub4_grade, ol_sub5_id = :ol_sub5_id, ol_sub5_grade = :ol_sub5_grade,
                            ol_sub6_id = :ol_sub6_id, ol_sub6_grade = :ol_sub6_grade, ol_sub7_id = :ol_sub7_id, ol_sub7_grade = :ol_sub7_grade, 
                            ol_sub8_id = :ol_sub8_id, ol_sub8_grade = :ol_sub8_grade, ol_sub9_id = :ol_sub9_id,  ol_sub9_grade = :ol_sub9_grade
                             WHERE stu_id = :id');

        // bind values
        $this->db->bind(':id', $id);
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

    // update setting for al qualified
    public function updateStudentALSettings($id, $data) {
        $this->db->query('UPDATE alqualifiedstudent SET al_school = :al_school, stream = :stream, z_score = :z_score,
                            al_district = :al_district, al_general_test_grade = :al_general_test_grade, al_general_english_grade = :al_general_english_grade, 
                            al_sub1_id = :al_sub1_id, al_sub1_grade = :al_sub1_grade, al_sub2_id = :al_sub2_id, al_sub2_grade = :al_sub2_grade,
                            al_sub3_id = :al_sub3_id, al_sub3_grade = :al_sub3_grade
                             WHERE stu_id = :id');

        $this->db->bind(':id', $id);
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

    // update setting for undergraduate graduate
    public function updateStudentUGSettings($id, $data) {
        $this->db->query('UPDATE undergraduategraduate SET degree = :degree, uni_type = :uni_type, uni_name = :uni_name, gpa = :gpa WHERE stu_id = :id');
        // bind values        
        $this->db->bind(":uni_type", $data['uni_type']);
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

    public function updateProfilePic($data) {           
        $this->db->query('UPDATE users SET profile_image = :profile_image WHERE id = :id');
        // bind values
        $this->db->bind("profile_image", $data['profile_image_name']);
        $this->db->bind("id", $_SESSION['user_id']);

        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

     // get districts 
     public function getDistricts() {
        $this->db->query("SELECT * FROM district");
        $results = $this->db->resultSet();

        return $results;
    }

    // get ol subjects 
    public function getOLSubjects() {
        $this->db->query("SELECT * FROM olsubject");
        $results = $this->db->resultSet();

        return $results;
    }

    // get streams 
    public function getStreams() {
        $this->db->query("SELECT * FROM stream");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getStreamNameById($id) {
        $this->db->query("SELECT * FROM stream WHERE stream_id = :id");
        $this->db->bind(':id', $id);
        $results = $this->db->single();

        return $results->stream_name;
    }

    // get al subjects 
    public function getALSubjects() {
        $this->db->query("SELECT * FROM alsubject");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getALSubjectsById($stream_id) {
        $this->db->query("SELECT * FROM alsubject WHERE al_stream_id = :stream_id");
        $this->db->bind(':stream_id', $stream_id);

        $results = $this->db->resultSet();

        return $results;
    }

    // get uni types 
    public function getUniTypes() {
        $this->db->query("SELECT * FROM universitytype");
        $results = $this->db->resultSet();

        return $results;
    }

}

?>