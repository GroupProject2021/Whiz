<?php
    class Organizations extends Controller {
        public function __construct() {
            $this->organiizationModel = $this->model('Organization');
        }

        public function register() {
            $this->view('organization/organization_register');
        }

        public function university_register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'address' => trim($_POST['address']),
                    'gender' => trim($_POST['gender']),
                    'date_of_birth' => trim($_POST['date_of_birth']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'phn_no' => trim($_POST['phn_no']),

                    'name_err' => '',
                    'address_err' => '',
                    'gender_err' => '',
                    'date_of_birth_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phn_no_err' => ''
                ];

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
                    if($this->organizationModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken'; 
                    }
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

                // Validate phone number
                if(empty($data['phn_no'])) {
                    $data['phn_no_err'] = 'Please enter phone number';
                }

                // Make sure errors are empty
                if(empty($data['name_err']) && empty($data['address_err']) && empty($data['gender_err']) && empty($data['date_of_birth_err'])
                    && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['phn_no_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->organizationModel->register($data)) {
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
                    $this->view('organization/university/university_register', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'name' => '',
                    'address' => '',
                    'gender' => '',
                    'date_of_birth' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'phn_no' => '',
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
                $this->view('organization/university/university_register', $data);
            }
        }
    }
?>
        