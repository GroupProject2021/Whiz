<?php
    class Students extends Controller {
        public function __construct() {
            $this->studentModel = $this->model('Student');
        }

        public function register() {
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
                    'address' => trim($_POST['address']),
                    'gender' => trim($_POST['gender']),
                    'date_of_birth' => trim($_POST['date_of_birth']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'phn_no' => trim($_POST['phn_no']),

                    'profile_image_err' => '',
                    'name_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    'date_of_birth_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phn_no_err' => ''
                ];

                // validate and upload profile image
                if(uploadImage($data['profile_image']['tmp_name'], $data['profile_image_name'], '/profileimages/student/')) {
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

                // Validate address
                if(empty($data['address'])) {
                    $data['address_err'] = 'Please enter address';
                }

                // Validate gender
                if(empty($data['gender'])) {
                    $data['gender_err'] = 'Please enter gender';
                }

                // Validate date of birth
                if(empty($data['date_of_birth'])) {
                    $data['date_of_birth_err'] = 'Please enter date of birth';
                }

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }
                else {
                    // Check email
                    if($this->studentModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken'; 
                    }
                }

                // Validata password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
                else if(strlen($data['password']) < 8) {
                    $data['password_err'] = 'Password must be having at least 8 characters';
                }
                else {
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

                // Validate phone number
                if(empty($data['phn_no'])) {
                    $data['phn_no_err'] = 'Please enter phone number';
                }

                // Make sure errors are empty
                if(empty($data['profile_image_err']) && empty($data['name_err']) && empty($data['address_err']) && empty($data['gender_err']) && empty($data['date_of_birth_err'])
                    && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['phn_no_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // $this->sendVerificationEmail($data['email'], 'Whiz', 'segroupproject2021@gmail.com', 'hi');

                    // Register User
                    if($this->studentModel->registerAsAUser($data)) {
                        // take the id
                        $userId = $this->studentModel->getUserIdByEmail($data['email']);

                        if($this->studentModel->registerAsAStudent($userId, $data)) {
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
                    $this->view('students/student_register', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'profile_image' => '',
                    'profile_image_name' => '',
                    'name' => '',
                    'address' => '',
                    'gender' => '',
                    'date_of_birth' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'phn_no' => '',

                    'profile_image_err' => '',
                    'name_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    'date_of_birth_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phn_no_err' => ''
                ];

                // Load view
                $this->view('students/student_register', $data);
            }
        }
    }
?>