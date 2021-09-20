<?php

class M_S_Stream {
    private $db;

    public function __construct() {
        $this->db = new Database;
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

    public function getALSubjectsById($stream_id) {
        $this->db->query("SELECT * FROM alsubject WHERE al_stream_id = :stream_id");
        $this->db->bind(':stream_id', $stream_id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function findStudentIdbyEmail($email) {
        $this->db->query('SELECT * FROM student WHERE email = :email');
        // bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $id = $row->stu_id;
        return $id;
    }

    public function getStudentOLDetails($id) {
        $this->db->query('SELECT * FROM olqualifiedstudent WHERE stu_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}

?>