<?php

class M_S_Stream {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // get streams 
    public function getStreams() {
        $this->db->query("SELECT * FROM Stream");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getStreamNameById($id) {
        $this->db->query("SELECT * FROM Stream WHERE stream_id = :id");
        $this->db->bind(':id', $id);
        $results = $this->db->single();

        return $results->stream_name;
    }

    public function getALSubjects() {
        $this->db->query("SELECT * FROM ALSubject");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getALSubjectsById($stream_id) {
        $this->db->query("SELECT * FROM ALSubject WHERE al_stream_id = :stream_id");
        $this->db->bind(':stream_id', $stream_id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function findStudentIdbyEmail($email) {
        $this->db->query('SELECT * FROM Student WHERE email = :email');
        // bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $id = $row->stu_id;
        return $id;
    }

    public function getStudentOLDetails($id) {
        $this->db->query('SELECT * FROM OLQualifiedStudent WHERE stu_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}

?>