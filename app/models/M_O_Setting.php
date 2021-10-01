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
        $this->db->query('UPDATE users SET name = :uniname WHERE id = :id');
            // bind values
            $this->db->bind(':id', $id);
            $this->db->bind(':uniname', $data['uniname']);

            $this->db->execute();

            //finf org_id
            $org_id = $this->findOrganizationIdbyEmail($_SESSION['user_email']);

            // register as an organization
            $this->db->query('UPDATE organization SET org_name = :uniname, address = :address, 
                            phone_no = :phn_no, website_address = :website, founder = :founder, 
                            founded_year= :founded_year WHERE org_id= :id');
            // bind values
            $this->db->bind(":id", $org_id;
            $this->db->bind(":uniname", $data['uniname']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":website", $data['website']);
            $this->db->bind(":founder", $data['founder']);
            $this->db->bind(":founded_year", $data['founded_year']);

            $this->db->execute();

            // register as a university
            $this->db->query('UPDATE privateuniversity SET ugc_approval = :approved, world_rank = :rank, 
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

    // update setting for company
    public function updateCompanySettings($id, $data) {
        $this->db->query('UPDATE users SET name = :comname WHERE id = :id');
            // bind values
            $this->db->bind(':id', $id);
            $this->db->bind(':comname', $data['comname']);

            $this->db->execute();

            //finf org_id
            $org_id = $this->findOrganizationIdbyEmail($_SESSION['user_email']);

            // register as an organization
            $this->db->query('UPDATE organization SET org_name = :comname, address = :address, 
                            phone_no = :phn_no, website_address = :website, founder = :founder, 
                            founded_year= :founded_year WHERE org_id= :id');
            // bind values
            $this->db->bind(":id", $org_id;
            $this->db->bind(":comname", $data['comname']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":website", $data['website']);
            $this->db->bind(":founder", $data['founder']);
            $this->db->bind(":founded_year", $data['founded_year']);

            $this->db->execute();

            // register as a company
            $this->db->query('UPDATE company SET current_emplyee_amount = :cur_emp, company_size = :emp_size, 
                            registered = :registered, overview = :overview, services = :services, 
                            WHERE company_id = :id');
            // bind values
            $this->db->bind(":id", $org_id);
            $this->db->bind(":cur_emp", $data['cur_emp']);
            $this->db->bind(":emp_size", $data['emp_size']);
            $this->db->bind(":registered", $data['registered']);
            $this->db->bind(":overview", $data['overview']);
            $this->db->bind(":services", $data['services']);


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

    public function updateProfilePic($data) {           
        $this->db->query('UPDATE users SET profile_image = :profile_image WHERE id = :id');
        // bind values
        $this->db->bind("profile_image", $data['profile_image_name']);
        $this->db->bind("id", $_SESSION['user_id']);

        $this->db->execute();

        $org_id = this->findOrganizationIdbyEmail($_SESSION['user_email']);

        $this->db->query('UPDATE organization SET profile_image = :profile_image WHERE org_id = :id');
        // bind values
        $this->db->bind("profile_image", $data['profile_image_name']);
        $this->db->bind("id", $org_id);

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