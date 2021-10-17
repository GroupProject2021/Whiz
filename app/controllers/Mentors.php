<?php
    class Mentors extends Controller {
        public function __construct() {
            $this->mentorModel = $this->model('Mentor');
        }

        // Register
        public function register(){
            $data = [];

            $this->view('mentors/mentor_register', $data);
        }


        // Professional guider registration
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
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'email' => trim($_POST['email']),
                    'phn_no' => trim($_POST['phn_no']),
                    'address' => trim($_POST['address']),
                    'gender' => trim($_POST['gender']),
                    'institute' => trim($_POST['institute']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phn_no_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    'institute_err' => '',
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
                if(empty($data['first_name']) || empty($data['last_name'])) {
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
                    if($this->mentorModel->registerAsAUser($data, 'Professional Guider')) {
                        // take the id
                        $userId = $this->mentorModel->getUserIdByEmail($data['email']);

                        if($this->mentorModel->registerAsAProfGuider($userId, $data)) {
                            // set the verification sent email                        
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
                    'first_name' => '',
                    'last_name' => '',
                    'email' => '',
                    'phn_no' => '',
                    'address' => '',
                    'gender' => '',
                    'institute' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phn_no_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    'institute_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('mentors/professional_guide_register', $data);
            }
        }
        
        // Teacher registration
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
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'email' => trim($_POST['email']),
                    'phn_no' => trim($_POST['phn_no']),
                    'address' => trim($_POST['address']),
                    'gender' => trim($_POST['gender']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phn_no_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
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
                if(empty($data['first_name']) || empty($data['last_name'])) {
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
                    if($this->mentorModel->registerAsAUser($data, 'Teacher')) {
                        // take the id
                        $userId = $this->mentorModel->getUserIdByEmail($data['email']);

                        if($this->mentorModel->registerAsATeacher($userId, $data)) {
                            // set the verification sent email                        
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
                    'first_name' => '',
                    'last_name' => '',
                    'email' => '',
                    'phn_no' => '',
                    'address' => '',
                    'gender' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'phn_no_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('mentors/teacher_register', $data);
            }
        }
    }
?>