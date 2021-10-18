<?php 

class M_M_Settings{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUserDetails($id) {
        $this->db->query('SELECT * FROM Users WHERE id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    } 
    
    // get mentor details
    public function getMentorDetails($id) {
        $this->db->query('SELECT * FROM Mentor INNER JOIN Users ON Mentor.mentor_id = Users.id WHERE mentor_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // useful for take a mentor data from mentors
    public function findMentorIdbyEmail($email) {
        $this->db->query('SELECT * FROM Mentor WHERE email = :email');
        // bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $id = $row->mentor_id;
        return $id;
    }

    public function updateGuiderSettings($id, $data) {
        $this->db->query('UPDATE Users SET first_name = :first_name, last_name = :last_name
                             WHERE id = :id');
        // bind values                
        $this->db->bind(":first_name", $data['first_name']);
        $this->db->bind(":last_name", $data['last_name']);
        $this->db->bind(":id", $id);

        $res1 = $this->db->execute();

        $this->db->query('UPDATE Mentor SET address = :address, gender = :gender,
                            institute = :institute, email = :email, phn_no = :phn_no
                             WHERE mentor_id = :id');
        // bind values
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":phn_no", $data['phn_no']);
        $this->db->bind(":address", $data['address']);
        $this->db->bind(":gender", $data['gender']);
        $this->db->bind(":institute", $data['institute']);
        $this->db->bind(":id", $id);

        $res2 = $this->db->execute();

        // Execute
        if($res1 && $res2) {
            return true;
        }
        else {
            return false;
        }
    }

    public function updateTeacherSettings($id, $data) {
        $this->db->query('UPDATE Users SET first_name = :first_name, last_name = :last_name
                             WHERE id = :id');
        // bind values                
        $this->db->bind(":first_name", $data['first_name']);
        $this->db->bind(":last_name", $data['last_name']);
        $this->db->bind(":id", $id);

        $res1 = $this->db->execute();

        $this->db->query('UPDATE Mentor SET address = :address, gender = :gender,
                            email = :email, phn_no = :phn_no
                             WHERE mentor_id = :id');
        // bind values
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":phn_no", $data['phn_no']);
        $this->db->bind(":address", $data['address']);
        $this->db->bind(":gender", $data['gender']);
        // $this->db->bind(":institute", 'NULL');
        $this->db->bind(":id", $id);

        $res2 = $this->db->execute();

        // Execute
        if($res1 && $res2) {
            return true;
        }
        else {
            return false;
        }
    }

    public function updateProfilePic($data) {           
        $this->db->query('UPDATE Users SET profile_image = :profile_image WHERE id = :id');
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
        $this->db->query('SELECT * FROM Connections WHERE to_user_id = :id');
        // bind values
        $this->db->bind(":id", $id);

        $this->db->single();
        
        $result = $this->db->rowCount();

        return $result;
    }

    public function getFollowingCount($id) {
        $this->db->query('SELECT * FROM Connections WHERE from_user_id = :id');
        // bind values
        $this->db->bind(":id", $id);

        $this->db->single();
        
        $result = $this->db->rowCount();

        return $result;
    }

    public function isAlreadyFollow($me, $id) {
        $this->db->query('SELECT * FROM Connections WHERE from_user_id = :me AND to_user_id = :id');
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