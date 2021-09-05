<?php
    class Mentor {
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
            $this->db->bind(':actor_type', 'Mentor');
            $this->db->bind(':specialized_actor_type', 'prof guider');

            $this->db->execute();

            // register as mentor
            $this->db->query('INSERT INTO mentor(name, email, mentor_type, password) VALUES(:name, :email, :mentor_type, :password)');
            // bind values
            $this->db->bind(":name", $data['name']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":mentor_type", $data['mentor_type']);
            $this->db->bind(":password", $data['password']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Login user
        public function login($email, $password) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)) {
                return $row;
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

        // useful for initialized the beginner details using mentors
        public function findMentorIdbyEmail($email) {
            $this->db->query('SELECT * FROM mentor WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row->stu_id;
        }
    }
?>