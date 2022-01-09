<?php

class M_S_CV {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // get student details
    public function getStudentDetails($id) {
        $this->db->query('SELECT * FROM Student INNER JOIN Users ON Users.id = Student.stu_id WHERE stu_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getStudentOLDetails($id) {
        $this->db->query('SELECT * FROM OLQualifiedStudent WHERE stu_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getStudentALDetails($id) {
        $this->db->query('SELECT * FROM ALQualifiedStudent WHERE stu_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getStudentUniversityDetails($id) {
        $this->db->query('SELECT * FROM UndergraduateGraduate WHERE stu_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

     // get subject details
     public function getOLSubjectName($id) {
        $this->db->query('SELECT * FROM OLSubject WHERE ol_sub_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row->ol_sub_name;
    }

    public function getALSubjectName($id) {
        $this->db->query('SELECT * FROM ALSubject WHERE al_sub_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row->al_sub_name;
    }

    public function getStreamNameById($id) {
        $this->db->query("SELECT * FROM Stream WHERE stream_id = :id");
        $this->db->bind(':id', $id);
        $results = $this->db->single();

        return $results->stream_name;
    }

    // CV
    public function addCV($data) {
        // register as a user    
        $this->db->query('INSERT INTO CV(user_id, cv_file_name) VALUES(:user_id, :cv_file_name)');
        // bind values
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':cv_file_name', $data['file_name']);

        // Execute
        if($this->db->execute()) {
            // return true;
            return true;
        }
        else {
            return false;
        }
    }

    public function updateCV($data) {
        $this->db->query('UPDATE CV SET cv_file_name = :cv_file_name WHERE user_id = :id');
        // bind values                
        $this->db->bind(":cv_file_name", $data['file_name']);
        $this->db->bind(":id", $_SESSION['user_id']);

        $res1 = $this->db->execute();

        // Execute
        if($res1) {
            return true;
        }
        else {
            return false;
        }
    }

    // get CV file existence
    public function isCVFileExists($id) {
        $this->db->query('SELECT cv_file_name FROM CV WHERE user_id = :id'); // this is a prepared statement
        // bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        // Check row - return true if email exists. Because then rowCount is not 0
        if($this->db->rowCount() > 0) {
            return $row->cv_file_name;
        }
        else {
            return false;
        }
    }
}

?>