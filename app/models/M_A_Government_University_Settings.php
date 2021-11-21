<?php

class M_A_Government_University_Settings {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // get university details
    public function getGovUniversityDetails($id) {
        $this->db->query('SELECT * FROM GovermentUniversity WHERE gov_uni_id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getCourseOfferings($uniName) {
        $this->db->query('SELECT * FROM v_gov_course_and_university WHERE uni_name = :uni_name');
        $this->db->bind(':uni_name', $uniName);

        $results = $this->db->resultSet();

        return $results;
    }
    
    // get user details
    public function getUserDetails($id) {
        $this->db->query('SELECT * FROM Users WHERE id = :id');
        // bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    } 

    // useful for take a organization data from organizations
    public function findOrganizationIdbyEmail($email) {
        $this->db->query('SELECT * FROM Organization WHERE email = :email');
        // bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $id = $row->org_id;
        return $id;
    }

    // update settings for university
    public function updateUniversitySettings($id, $data) {
        $this->db->query('UPDATE Users SET first_name = :uniname WHERE id = :id');
            // bind values
            $this->db->bind(':id', $id);
            $this->db->bind(':uniname', $data['uniname']);

            $this->db->execute();

            //finf org_id
            $org_id = $this->findOrganizationIdbyEmail($_SESSION['user_email']);

            // register as an organization
            $this->db->query('UPDATE Organization SET address = :address, 
                            phone_no = :phn_no, website_address = :website, founder = :founder, 
                            founded_year= :founded_year WHERE org_id= :id');
            // bind values
            $this->db->bind(":id", $org_id);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":website", $data['website']);
            $this->db->bind(":founder", $data['founder']);
            $this->db->bind(":founded_year", $data['founded_year']);

            $this->db->execute();

            // register as a university
            $this->db->query('UPDATE PrivateUniversity SET ugc_approval = :approved, world_rank = :rank, 
                            student_amount = :amount, graduate_job_rate = :rate, description = :descrip, 
                            uni_type = :type WHERE privateuni_id = :id');
            // bind values
            $this->db->bind(":id", $org_id);
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
   
}

?>