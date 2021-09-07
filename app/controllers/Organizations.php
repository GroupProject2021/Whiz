<?php
    class Organizations extends Controller {
        public function __construct() {
            $this->organizationModel = $this->model('Organization');
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
                    'uniname' => trim($_POST['uniname']),
                    'address' => trim($_POST['address']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'phn_no' => trim($_POST['phn_no']),
                    'website' => trim($_POST['website']),
                    'founder' => trim($_POST['founder']),
                    'founded_year' => trim($_POST['founded_year']),
                    'approved' => trim($_POST['approved']),
                    'rank' => trim($_POST['rank']),
                    'amount' => trim($_POST['amount']),
                    'rate' => trim($_POST['rate']),
                    'descrip' => trim($_POST['descrip']),
                    'type' => trim($_POST['type']),

                    'uniname_err' => '',
                    'address_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phn_no_err' => '',
                    'website_err' => '',
                    'founder_err' => '',
                    'founded_year_err' => '',
                    'approved_err' => '',
                    'rank_err' => '',
                    'amount_err' => '',
                    'rate_err' => '',
                    'descrip_err' => '',
                    'type_err' => ''
                ];

                // Validate name
                if(empty($data['uniname'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate address
                if(empty($data['address'])) {
                    $data['address_err'] = 'Please enter address';
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

                // Validate website
                if(empty($data['website'])) {
                    $data['website_err'] = 'Please enter website';
                }

                // Validate founded_year
                if(empty($data['founded_year'])) {
                    $data['founded_year_err'] = 'Please enter founded year';
                }

                // Validate approved
                if(empty($data['approved'])) {
                    $data['approved_err'] = 'Please select approved or not';
                }

                // Validate rank
                if(empty($data['rank'])) {
                    $data['rank_err'] = 'Please enter rank';
                }

                // Validate amount
                if(empty($data['amount'])) {
                    $data['amount_err'] = 'Please enter student amount';
                }

                // Validate rate
                if(empty($data['rate'])) {
                    $data['rate_err'] = 'Please enter rate';
                }

                // Validate description
                if(empty($data['descrip'])) {
                    $data['descrip_err'] = 'Please enter description';
                }

                // Validate type
                if(empty($data['type'])) {
                    $data['type_err'] = 'Please select university type';
                }

                // Make sure errors are empty
                if(empty($data['uniname_err']) && empty($data['address_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) 
                && empty($data['phn_no_err']) && empty($data['website_err']) && empty($data['founded_year_err']) && empty($data['approved_err']) && empty($data['rank_err']) 
                && empty($data['amount_err']) && empty($data['rate_err']) && empty($data['descrip_err']) && empty($data['type_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->organizationModel->university_register($data)) {
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
                    'uniname' => '',
                    'address' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'phn_no' => '',
                    'website' => '',
                    'founder' => '',
                    'founded_year' => '',
                    'approved' => '',
                    'rank' => '',
                    'amount' => '',
                    'rate' => '',
                    'descrip' => '',
                    'type' => '',

                    'uniname_err' => '',
                    'address_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phn_no_err' => '',
                    'website_err' => '',
                    'founder_err' => '',
                    'founded_year_err' => '',
                    'approved_err' => '',
                    'rank_err' => '',
                    'amount_err' => '',
                    'rate_err' => '',
                    'descrip_err' => '',
                    'type_err' => ''
                ];

                // Load view
                $this->view('organization/university/university_register', $data);
            }
        }
    }
?>
        