<?php 

class M_M_Settings{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUserDetails($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
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

    public function updateTeacherSettings($id, $data) {
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

    public function getFollowerCount($id) {
        $this->db->query('SELECT * FROM connections WHERE to_user_id = :id');
        // bind values
        $this->db->bind(":id", $id);

        $this->db->single();
        
        $result = $this->db->rowCount();

        return $result;
    }

    public function getFollowingCount($id) {
        $this->db->query('SELECT * FROM connections WHERE from_user_id = :id');
        // bind values
        $this->db->bind(":id", $id);

        $this->db->single();
        
        $result = $this->db->rowCount();

        return $result;
    }

    public function isAlreadyFollow($me, $id) {
        $this->db->query('SELECT * FROM connections WHERE from_user_id = :me AND to_user_id = :id');
        // bind values
        $this->db->bind(":me", $me);
        $this->db->bind(":id", $id);

        $this->db->single();
        
        $result = $this->db->rowCount();

        if($result > 0) {
            return true;
        } 
        else {
            return false;
        }
    }
}
?>