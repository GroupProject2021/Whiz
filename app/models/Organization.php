<?php
    class Organization {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register university
        public function university_register($data) {        
            // register as a user    
            $this->db->query('INSERT INTO users(name, email, password, actor_type, specialized_actor_type) VALUES(:uniname, :email, :password, :actor_type, :specialized_actor_type)');
            // bind values
            $this->db->bind(':uniname', $data['uniname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Organization');
            $this->db->bind(':specialized_actor_type', 'University');

            $this->db->execute();
            

           
            // register as an organization
            $this->db->query('INSERT INTO organization(org_name, address, email, password, phone_no, website_address, founder, founded_year,org_type) VALUES(:uniname, :address, :email, :password, :phn_no, :website, :founder, :founded_year, :type)');
            // bind values
            $this->db->bind(":uniname", $data['uniname']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":password", $data['password']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":website", $data['website']);
            $this->db->bind(":founder", $data['founder']);
            $this->db->bind(":founded_year", $data['founded_year']);
            $this->db->bind(":type", $data['type']);

            $this->db->execute();

            $uni_id = $this->db->query('SELECT MAX(org_id) FROM organization');

            // register as a university
            $this->db->query('INSERT INTO privateuniversity(privateuni_id, ugc_approval, world_rank, student_amount, graduate_job_rate, description, uni_type) VALUES($uni_id, :approved, :rank, :amount, :rate, :descrip, :type)');
            // bind values
         // $this->db->bind(":id", $uni_id);
            $this->db->bind(":approved", $data['approved']);
            $this->db->bind(":rank", $data['rank']);
            $this->db->bind(":amount", $data['amount']);
            $this->db->bind(":rate", $data['rate']);
            $this->db->bind(":descrip", $data['descrip']);
            $this->db->bind(":type", $data['type']);


            // Execute
            $this->db->execute();
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
    }
?>