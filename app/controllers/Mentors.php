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
                    'profile_image' => $_FILES['profile_image'],
                    'profile_image_name' => time().'_'.$_FILES['profile_image']['name'],
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'phn_no' => trim($_POST['phn_no']),
                    'address' => trim($_POST['address']),
                    'gender' => trim($_POST['gender']),
                    'institute' => trim($_POST['institute']),
                    // 'subject1' => trim($_POST['subject1']),
                    // 'subject2' => trim($_POST['subject2']),
                    // 'subject3' => trim($_POST['subject3']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phn_no_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    'institute_err' => '',
                    // 'subject1_err' => '',
                    // 'subject2_err' => '',
                    // 'subject3_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                if(uploadImage($data['profile_image']['tmp_name'], $data['profile_image_name'], '/profileimages/mentor/')) {
                    flash('profile_image_upload', 'Profile picture uploaded successfully');
                }
                else {
                    // upload unsuccessfull
                    $data['profile_image_err'] = 'Profile picture uploading unsuccessful';
                }

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

                // Validate phone number
                if(empty($data['phn_no'])) {
                    $data['phn_no_err'] = 'Please enter phone number';
                }

                // Validate address
                if(empty($data['address'])) {
                    $data['address_err'] = 'Please enter address';
                }

                // Validate gender
                if(empty($data['gender'])) {
                    $data['gender_err'] = 'Please enter gender';
                }

                // Validate institute
                if(empty($data['institute'])) {
                    $data['institute_err'] = 'Please enter mentor type';
                }

                // Validate sub 1
                // if(empty($data['subject1'])) {
                //     $data['subject1_err'] = 'Please enter mentor type';
                // }

                // // Validate sub 2
                // if(empty($data['subject2'])) {
                //     $data['subject2_err'] = 'Please enter mentor type';
                // }

                // // Validate sub 3
                // if(empty($data['subject3'])) {
                //     $data['subject3_err'] = 'Please enter mentor type';
                // }

                // Validata password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
                else if(strlen($data['password']) < 8) {
                    $data['password_err'] = 'Password must be at least 8 characters';
                }else {
                    if(!preg_match('@[0-9]@', $data['password'])) {
                        $data['password_err'] = 'Please must be having at least one number';
                    }

                    if(!preg_match('@[A-Z]@', $data['password'])) {
                        $data['password_err'] = 'Password must be having at least one uppercase letter';
                    }
                    
                    if(!preg_match('@[^\w]@', $data['password'])) {
                        $data['password_err'] = 'Password must be having at least 1 special character';
                    }
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
                if(empty($data['profile_image_err']) && empty($data['name_err']) && empty($data['email_err']) && empty($data['phn_no_err']) && empty($data['address_err']) && empty($data['gender_err']) && empty($data['institute_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->mentorModel->registerasprofguider($data)) {
                        // // Redirect
                        // flash('register_success', 'You are registered can log in');
                        // redirect('commons/login');
                        sendVerificationCode($data['email']);

                        // Redirect
                        flash('register_success', '<center>You are registered! <br> We sent a verification code to your email <br>'.$data['email'].'</center>');
                        redirect('Commons/userEmailVerification');
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
                    'profile_image' => '',
                    'name' => '',
                    'email' => '',
                    'phn_no' => '',
                    'address' => '',
                    'gender' => '',
                    'institute' => '',
                    // 'subject1_err' => '',
                    // 'subject2_err' => '',
                    // 'subject3_err' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phn_no_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    'institute_err' => '',
                    // 'subject1_err' => '',
                    // 'subject2_err' => '',
                    // 'subject3_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
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
                    'profile_image' => $_FILES['profile_image'],
                    'profile_image_name' => time().'_'.$_FILES['profile_image']['name'],
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'phn_no' => trim($_POST['phn_no']),
                    'address' => trim($_POST['address']),
                    'gender' => trim($_POST['gender']),
                    // 'subject1' => trim($_POST['subject1']),
                    // 'subject2' => trim($_POST['subject2']),
                    // 'subject3' => trim($_POST['subject3']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phn_no_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    // 'subject1_err' => '',
                    // 'subject2_err' => '',
                    // 'subject3_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                if(uploadImage($data['profile_image']['tmp_name'], $data['profile_image_name'], '/profileimages/mentor/')) {
                    flash('profile_image_upload', 'Profile picture uploaded successfully');
                }
                else {
                    // upload unsuccessfull
                    $data['profile_image_err'] = 'Profile picture uploading unsuccessful';
                }

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

                // Validate phone number
                if(empty($data['phn_no'])) {
                    $data['phn_no_err'] = 'Please enter phone number';
                }

                // Validate address
                if(empty($data['address'])) {
                    $data['address_err'] = 'Please enter address';
                }

                // Validate gender
                if(empty($data['gender'])) {
                    $data['gender_err'] = 'Please enter gender';
                }

                // Validate subjects
                // if(empty($data['subjects'])) {
                //     $data['subjects_err'] = 'Please enter mentor type';
                // }

                // Validata password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
                else if(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }else {
                    if(!preg_match('@[0-9]@', $data['password'])) {
                        $data['password_err'] = 'Please must be having at least one number';
                    }

                    if(!preg_match('@[A-Z]@', $data['password'])) {
                        $data['password_err'] = 'Password must be having at least one uppercase letter';
                    }
                    
                    if(!preg_match('@[^\w]@', $data['password'])) {
                        $data['password_err'] = 'Password must be having at least 1 special character';
                    }
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
                if(empty($data['profile_image_err']) && empty($data['name_err']) && empty($data['email_err']) && empty($data['phn_no_err']) && empty($data['address_err']) && empty($data['gender_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->mentorModel->registerasteacher($data)) {
                        // // Redirect
                        // flash('register_success', 'You are registered can log in');
                        // redirect('commons/login');
                        sendVerificationCode($data['email']);

                        // Redirect
                        flash('register_success', '<center>You are registered! <br> We sent a verification code to your email <br>'.$data['email'].'</center>');
                        redirect('Commons/userEmailVerification');
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
                    'profile_image' => '',
                    'profile_image_name' => '',
                    'name' => '',
                    'email' => '',
                    'phn_no' => '',
                    'address' => '',
                    'gender' => '',
                    // 'subject1' => '',
                    // 'subject2' => '',
                    // 'subject3' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phn_no_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    // 'subject1_err' => '',
                    // 'subject2_err' => '',
                    // 'subject3_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
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

            redirect('commons/login');
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