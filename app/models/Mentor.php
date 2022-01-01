<?php
    class Mentor {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register as a user
        public function registerAsAUser($data, $specialize_type) {
            // register as a user    
            $this->db->query('INSERT INTO Users(profile_image, first_name, last_name, email, password, actor_type, specialized_actor_type, status) VALUES(:profile_image, :first_name, :last_name, :email, :password, :actor_type, :specialized_actor_type, :status)');
            // bind values
            $this->db->bind("profile_image", $data['profile_image_name']);
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':actor_type', 'Mentor');
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

        // Register professional guider
        public function registerAsAProfGuider($id, $data) {
            $this->db->query('INSERT INTO Mentor(mentor_id, email, phn_no, address, gender, institute, mentor_type, password) VALUES(:mentor_id, :email, :phn_no, :address, :gender, :institute, :mentor_type, :password)');
            // bind values
            $this->db->bind(":mentor_id", $id);
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
        public function registerAsATeacher($id, $data) {
            $this->db->query('INSERT INTO Mentor(mentor_id, email, phn_no, address, gender, mentor_type, password) VALUES(:mentor_id, :email, :phn_no, :address, :gender, :mentor_type, :password)');
            // bind values
            $this->db->bind(":mentor_id", $id);
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
        
        // Find user by email
        public function findUserByEmail($email) {
            // $this->db->query('SELECT * FROM student WHERE email = :email'); // this is a prepared statement
            $this->db->query('SELECT * FROM Users WHERE email = :email'); // this is a prepared statement
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
            $this->db->query('SELECT * FROM Mentor WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row->stu_id;
        }

        public function getUserIdByEmail($email) {
            $this->db->query('SELECT * FROM Users WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row->id;
        }
    }
?>