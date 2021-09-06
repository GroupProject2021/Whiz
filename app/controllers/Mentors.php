<?php
    class Mentors extends Controller {
        public function __construct() {
            $this->mentorModel = $this->model('Mentor');
        }

        public function register(){
            $data = [];

            $this->view('mentors/mentor_register', $data);
        }


        public function registerasprofguider() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'institute' => trim($_POST['institute']),
                    'subject1' => trim($_POST['subject1']),
                    'subject2' => trim($_POST['subject2']),
                    'subject3' => trim($_POST['subject3']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'institute_err' => '',
                    'subject1_err' => '',
                    'subject2_err' => '',
                    'subject3_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Validate name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }
                else {
                    // Check email
                    if($this->mentorModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken'; 
                    }
                }

                // Validate institute
                if(empty($data['institute'])) {
                    $data['institute_err'] = 'Please enter mentor type';
                }

                // Validate sub 1
                if(empty($data['subject1'])) {
                    $data['subject1_err'] = 'Please enter mentor type';
                }

                // Validate sub 2
                if(empty($data['subject2'])) {
                    $data['subject2_err'] = 'Please enter mentor type';
                }

                // Validate sub 3
                if(empty($data['subject3'])) {
                    $data['subject3_err'] = 'Please enter mentor type';
                }

                // Validata password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
                else if(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Validata confirm password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                }
                else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Make sure errors are empty
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['institute_err']) && empty($data['subject1_err']) && empty($data['subject2_err']) && empty($data['subject3_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->mentorModel->registerasprofguider($data)) {
                        // Redirect
                        flash('register_success', 'You are registered can log in');
                        redirect('commons/login');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('mentors/professional_guide_register', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'institute' => '',
                    'subject1' => '',
                    'subject2' => '',
                    'subject3' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'institute_err' => '',
                    'subject1_err' => '',
                    'subject2_err' => '',
                    'subject3_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Load view
                $this->view('mentors/professional_guide_register', $data);
            }
        }
        
        public function registerasteacher() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'school' => trim($_POST['school']),
                    'subjects' => trim($_POST['subjects']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'school_err' => '',
                    'subjects_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Validate name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }
                else {
                    // Check email
                    if($this->mentorModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken'; 
                    }
                }

                // Validate school
                if(empty($data['school'])) {
                    $data['school_err'] = 'Please enter school';
                }

                // Validate subjects
                if(empty($data['subjects'])) {
                    $data['subjects_err'] = 'Please enter mentor type';
                }

                // Validata password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
                else if(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Validata confirm password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                }
                else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Make sure errors are empty
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['school_err']) && empty($data['subjects_err'])  && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->mentorModel->registerasteacher($data)) {
                        // Redirect
                        flash('register_success', 'You are registered can log in');
                        redirect('commons/login');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('mentors/teacher_register', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'school' => '',
                    'subjects' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'school_err' => '',
                    'subjects_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Load view
                $this->view('mentors/teacher_register', $data);
            }
        }

        public function login() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // Check for user/email
                if($this->mentorModel->findUserByEmail($data['email'])) {
                    // User found
                }
                else {
                    //user not found
                    $data['email_err'] = 'No user found';
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->mentorModel->login($data['email'], $data['password']);

                    if($loggedInUser) {
                        // Create session
                        $this->createUserSession($loggedInUser);
                    }
                    else {
                        $data['password_err'] = 'Password incorrect';

                        $this->view('mentors/mentor_login', $data);
                    }
                }
                else {
                    // Load view with errors
                    $this->view('mentors/mentor_login', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];
            }

            // Load view
            $this->view('mentors/mentor_login', $data);
        }

        public function createUserSession($user) {
            // taken from the database
            $_SESSION['user_id'] = $user->stu_id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;

            redirect('Professional_Guiders_dashboard/index');
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();

            redirect('mentors/login');
        }

        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            }
            else {
                return false;
            }
        }
    }
?>