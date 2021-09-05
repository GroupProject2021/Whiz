<?php
    class Mentors extends Controller {
        public function __construct() {
            $this->mentorModel = $this->model('Mentor');
        }

        public function register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'mentor_type' => trim($_POST['mentor_type']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'mentor_type_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
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

                // Validate mentor type
                if(empty($data['mentor_type'])) {
                    $data['mentor_type_err'] = 'Please enter mentor type';
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
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['mentor_type_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->mentorModel->register($data)) {
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
                    $this->view('mentors/mentor_register', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'mentor_type' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'mentor_type_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('mentors/mentor_register', $data);
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

            redirect('students_beginner_dashboard/index');
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