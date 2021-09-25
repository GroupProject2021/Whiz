<?php 

class M_M_Settings{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // get mentor details
    public function getMentorDetails($id) {
        $this->db->query('SELECT * FROM mentor WHERE mentor_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // useful for take a mentor data from mentors
    public function findMentorIdbyEmail($email) {
        $this->db->query('SELECT * FROM mentor WHERE email = :email');
        // bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $id = $row->stu_id;
        return $id;
    }
}
?>