<?php
    class Mentor {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register professional guider
        public function registerasprofguider($data) {
            $this->db->query('INSERT INTO users(profile_image,name, email, password, actor_type, specialized_actor_type) VALUES(:profile_image, :name, :email, :password, :actor_type, :specialized_actor_type)');
            // bind values
            $this->db->bind("profile_image", $data['profile_image_name']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Mentor');
            $this->db->bind(':specialized_actor_type', 'Professional Guider');

            $this->db->execute();

/// HERE
            $this->db->query('INSERT INTO mentor(profile_image,name, email, institute, mentor_type, password) VALUES(:profile_image, :name, :email, :institute, :mentor_type, :password)');
            // bind values
            $this->db->bind("profile_image", $data['profile_image_name']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":gender", $data['gender']);
            $this->db->bind(':institute', $data['institute']);
            $this->db->bind(':mentor_type', 'Professional Guider');
            $this->db->bind(':password', $data['password']); 

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Register teacher
        public function registerasteacher($data) {
            $this->db->query('INSERT INTO users(profile_image, name, email, password, actor_type, specialized_actor_type) VALUES(:profile_image, :name, :email, :password, :actor_type, :specialized_actor_type)');
            // bind values
            $this->db->bind("profile_image", $data['profile_image_name']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Mentor');
            $this->db->bind(':specialized_actor_type', 'Teacher');

            $this->db->execute();

            $this->db->query('INSERT INTO mentor(profile_image, name, email, institute, mentor_type, password) VALUES(:profile_image, :name, :email, :institute, :mentor_type, :password)');
            // bind values
            $this->db->bind("profile_image", $data['profile_image_name']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(":phn_no", $data['phn_no']);
            $this->db->bind(":address", $data['address']);
            $this->db->bind(":gender", $data['gender']);
            $this->db->bind(':mentor_type', 'Teacher');
            $this->db->bind(':password', $data['password']); 

            // $this->db->query('INSERT INTO teacher(school, subjects) VALUES (:school, :subjects)');
            // // bind values
            // $this->db->bind(":school", $data['school']);
            // $this->db->bind(":subjects", $data['subjects']);

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
            // $this->db->query('SELECT * FROM student WHERE email = :email'); // this is a prepared statement
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

        // useful for initialized the beginner details using students
        public function findMentorIdbyEmail($email) {
            $this->db->query('SELECT * FROM mentor WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row->stu_id;
        }

        // public function findMentorIdbyId($mentor_id){
        //     $this->db->query('SELECT * FROM mentor WHERE mentor_id = :mentor_id');

        //     $this->db->bind(':mentor_id', $mentor_id);

        //     $row = $this->db->single();

        //     $id = $row->mentor_id;
        //     return $id;
        // }

        
    }
?>