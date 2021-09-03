<?php
    class Student {
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

        // this function not working i dont know why!!!!!!!!!!!!
        // public function registerAsBeginner($data) {
        //     // register as a beginner
        //     $this->db->query('INSERT INTO beginner(stu_id, school) VALUES(:stuid, :school)');
        //     // take stu_id from student table
        //     $stuId = $this->findStudentIdbyEmail($data['email']);
        //     //bind values
        //     $this->db->bind(':stuid', $stuId);
        //     $this->db->bind(':school', 'HRCC');

        //     // Execute
        //     if($this->db->execute()) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // Login user
        public function login($email, $password) {
            // $this->db->query('SELECT * FROM student WHERE email = :email');
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
        // public function findStudentIdbyEmail($email) {
        //     $this->db->query('SELECT * FROM student WHERE email = :email');
        //     // bind values
        //     $this->db->bind(':email', $email);

        //     $row = $this->db->single();

        //     $id = $row->stu_id;
        //     return $id;
        // }
    }
?>