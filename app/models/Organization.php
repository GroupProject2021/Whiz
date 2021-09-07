<?php
    class Organization {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register user
        public function register($data) {        
            // register as a user    
            $this->db->query('INSERT INTO users(name, email, password, actor_type, specialized_actor_type) VALUES(:name, :email, :password, :actor_type, :specialized_actor_type)');
            // bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Student');
            $this->db->bind(':specialized_actor_type', 'Beginner');

            $this->db->execute();
            

           
            // register as a student
            $this->db->query('INSERT INTO student(name, address, gender, date_of_birth, email, phn_no, password) VALUES(:name, :address, :gender, :date_of_birth, :email, :phn_no, :password)');
            // bind values
            $this->db->bind(":name", $data['name']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":gender", $data['gender']);
            $this->db->bind(":date_of_birth", $data['date_of_birth']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":password", $data['password']); 

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