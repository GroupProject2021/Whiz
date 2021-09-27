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

        $id = $row->mentor_id;
        return $id;
    }

    public function updateGuiderSettings($id, $data) {
        $this->db->query('UPDATE mentor SET name = :name, address = :address, gender = :gender,
                            institute = :institute, email = :email, phn_no = :phn_no
                             WHERE mentor_id = :id');
        // bind values
        
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":phn_no", $data['phn_no']);
        $this->db->bind(":address", $data['address']);
        $this->db->bind(":gender", $data['gender']);
        $this->db->bind(":institute", $data['institute']);
        $this->db->bind(":id", $id);

        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function updateTeachetSettings($id, $data) {
        $this->db->query('UPDATE mentor SET name = :name, address = :address, gender = :gender,
                            email = :email, phn_no = :phn_no
                             WHERE mentor_id = :id');
        // bind values
        
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":phn_no", $data['phn_no']);
        $this->db->bind(":address", $data['address']);
        $this->db->bind(":gender", $data['gender']);
        // $this->db->bind(":institute", 'NULL');
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