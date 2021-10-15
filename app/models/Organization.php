<?php
    class Organization {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register as a user
        public function registerAsAUser($data, $specialize_type) {
            // register as a user    
            $this->db->query('INSERT INTO users(profile_image, first_name, email, password, actor_type, specialized_actor_type, status) VALUES(:profile_image, :first_name, :email, :password, :actor_type, :specialized_actor_type, :status)');
            // bind values
            $this->db->bind("profile_image", $data['profile_image_name']);
            $this->db->bind(':first_name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Organization');
            $this->db->bind(':specialized_actor_type', $specialize_type);
            $this->db->bind(':status', 'not verified');

            // Execute
            if($this->db->execute()) {
                // return true;
                return true;
            }
            else {
                return false;
            }
        }

        // Register university
        public function registerAsAPrivateUniversity($id, $data) {
            // register as an organization
            $this->db->query('INSERT INTO organization(org_id, address, email, password, phone_no, website_address, founder, founded_year,org_type) VALUES(:org_id, :address, :email, :password, :phn_no, :website, :founder, :founded_year, :type)');
            // bind values
            $this->db->bind(":org_id", $id);
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
            // $uni_id = $this->findOrganizationIdbyEmail($data['email']);

            // register as a university
            $this->db->query('INSERT INTO privateuniversity(privateuni_id, ugc_approval, world_rank, student_amount, graduate_job_rate, description, uni_type) VALUES(:id, :approved, :rank, :amount, :rate, :descrip, :type)');
            // bind values
            $this->db->bind(":id", $id);
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

        public function registerAsACompany($id, $data) {
            // register as an organization
            $this->db->query('INSERT INTO organization(org_id, address, email, password, phone_no, website_address, founder, founded_year,org_type) VALUES(:org_id, :address, :email, :password, :phn_no, :website, :founder, :founded_year, :type)');
            // bind values
            $this->db->bind(":org_id", $id);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":password", $data['password']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":website", $data['website']);
            $this->db->bind(":founder", $data['founder']);
            $this->db->bind(":founded_year", $data['founded_year']);
            $this->db->bind(":type", 'Company');

            $this->db->execute();

            //finf org_id
            // $com_id = $this->findOrganizationIdbyEmail($data['email']);

            // register as a company
            $this->db->query('INSERT INTO company(company_id, current_emplyee_amount, company_size, registered, overview, services) VALUES(:id, :cur_emp, :emp_size, :registered, :overview, :services)');
            // bind values
            $this->db->bind(":id", $id);
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

        public function findOrganizationIdbyEmail($email) {
            $this->db->query('SELECT * FROM organization WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row->org_id;
        }

        public function getUserIdByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row->id;
        }
    }
?>