<?php
    class Organization {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register university
        public function university_register($data) {        
            // register as a user    
            $this->db->query('INSERT INTO users(profile_image, name, email, password, actor_type, specialized_actor_type, status) VALUES(:profile_image,:uniname, :email, :password, :actor_type, :specialized_actor_type, :status)');
            // bind values
            $this->db->bind(":profile_image", $data['profile_image_name']);
            $this->db->bind(':uniname', $data['uniname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Organization');
            $this->db->bind(':specialized_actor_type', 'University');
            $this->db->bind(':status', 'not verified');

            $this->db->execute();
            

           
            // register as an organization
            $this->db->query('INSERT INTO organization(profile_image, org_name, address, email, password, phone_no, website_address, founder, founded_year,org_type) VALUES(:profile_image, :uniname, :address, :email, :password, :phn_no, :website, :founder, :founded_year, :type)');
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
            $this->db->query('SELECT * FROM organization WHERE email = :email');
            // bind values
            $this->db->bind(':email', $data['email']);

            $row = $this->db->single();
            $uni_id = $row->org_id;

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

        public function company_register($data) {        
            // register as a user    
            $this->db->query('INSERT INTO users(profile_image, name, email, password, actor_type, specialized_actor_type, status) VALUES(:profile_image,:comname, :email, :password, :actor_type, :specialized_actor_type, :status)');
            // bind values
            $this->db->bind(":profile_image", $data['profile_image_name']);
            $this->db->bind(':comname', $data['comname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Organization');
            $this->db->bind(':specialized_actor_type', 'Company');
            $this->db->bind(':status', 'not verified');

            $this->db->execute();
           
            // register as an organization
            $this->db->query('INSERT INTO organization(profile_image, org_name, address, email, password, phone_no, website_address, founder, founded_year,org_type) VALUES(:profile_image, :comname, :address, :email, :password, :phn_no, :website, :founder, :founded_year, :type)');
            // bind values
            $this->db->bind(":profile_image", $data['profile_image_name']);
            $this->db->bind(":comname", $data['comname']);
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
            $this->db->query('SELECT * FROM organization WHERE email = :email');
            // bind values
            $this->db->bind(':email', $data['email']);

            $row = $this->db->single();
            $com_id = $row->org_id;

            // register as a company
            $this->db->query('INSERT INTO company(company_id, current_emplyee_amount, company_size, registered, overview, services) VALUES(:id, :cur_emp, :emp_size, :registered, :overview, :services)');
            // bind values
            $this->db->bind(":id", $com_id);
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

        // Find user by email
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE email = :email'); // this is a prepared statement
            // bind value
            $this->db->bind(":email", $email);

            $row = $this->db->single();

            // Check row - return true if email exists. Because then rowCount is not 0
            if($this->db->rowCount() > 0) {
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
    }
?>