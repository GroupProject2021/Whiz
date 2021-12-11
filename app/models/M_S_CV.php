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
}

?>