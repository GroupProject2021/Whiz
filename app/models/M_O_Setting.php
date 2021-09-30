<?php

class M_O_Settings {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // get organization details
    public function getOrganizationDetails($id) {
        $this->db->query('SELECT * FROM organization WHERE org_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // get university details
    public function getUniversityDetails($id) {
        $this->db->query('SELECT * FROM privateuniversity WHERE privateuni_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // get company details
    public function getCompanyDetails($id) {
        $this->db->query('SELECT * FROM company WHERE company_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
    
    // get user details
    public function getUserDetails($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    } 

    // useful for take a organization data from organizations
    public function findOrganizationIdbyEmail($email) {
        $this->db->query('SELECT * FROM organization WHERE email = :email');
        // bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $id = $row->org_id;
        return $id;
    }

    // update settings for university
    public function updateUniversitySettings($id, $data) {
        $this->db->query('UPDATE users SET name = :uniname, email = :email, password = :password, status:status WHERE id = :id');
            // bind values
            $this->db->bind(':id', $id);
            $this->db->bind(':uniname', $data['uniname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Organization');
            $this->db->bind(':specialized_actor_type', 'University');
            $this->db->bind(':status', 'not verified');

            $this->db->execute();
            

           
            // register as an organization
            $this->db->query('UPDATE organization SET org_name = :uniname, address = :address, email = :email, password = :password, phone_no = :phn_no, website_address = :website, founder = :founder, founded_year= :founded_year WHERE ');
            // bind values
            $this->db->bind(":profile_image", $data['profile_image_name']);
            $this->db->bind(":uniname", $data['uniname']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":password", $data['password']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":website", $data['website']);
            $this->db->bind(":founder", $data['founder']);
            $this->db->bind(":founded_year", $data['founded_year']);
            $this->db->bind(":type", 'University');

            $this->db->execute();

            //finf org_id
            $uni_id = $this->findOrganizationIdbyEmail($data['email']);

            // register as a university
            $this->db->query('INSERT INTO privateuniversity(privateuni_id, ugc_approval, world_rank, student_amount, graduate_job_rate, description, uni_type) VALUES(:id, :approved, :rank, :amount, :rate, :descrip, :type)');
            // bind values
            $this->db->bind(":id", $uni_id);
            $this->db->bind(":approved", $data['approved']);
            $this->db->bind(":rank", $data['rank']);
            $this->db->bind(":amount", $data['amount']);
            $this->db->bind(":rate", $data['rate']);
            $this->db->bind(":descrip", $data['descrip']);
            $this->db->bind(":type", $data['type']);


            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
    }
   

    // update setting for company
    public function updateCompanySettings($id, $data) {
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

    /* // get districts 
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
    }*/
}

?>