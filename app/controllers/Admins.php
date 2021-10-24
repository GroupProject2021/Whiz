<?php
    class Admins extends Controller {
        public function __construct() {
            $this->adminModel = $this->model('Admin');
        }

        // Admin registration
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
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'phn_no' => trim($_POST['phn_no']),
                    'user_role' => trim($_POST['user_role']),

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phn_no_err' => '',
                    'user_role_err' => ''
                ];

                // validate and upload profile image
                if(uploadImage($data['profile_image']['tmp_name'], $data['profile_image_name'], '/profileimages/admin/')) {
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
                if(empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = 'Please enter a valid email';
                }
                else {
                    // Check email
                    if($this->adminModel->findUserByEmail($data['email'])) {
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

                // Validate user role
                if(empty($data['user_role'])) {
                    $data['user_role_err'] = 'Please enter user role';
                }

                // Make sure errors are empty
                if(empty($data['profile_image_err']) && empty($data['name_err']) && empty($data['email_err']) && 
                    empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['phn_no_err']) &&
                    empty($data['user_role_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->adminModel->registerAsAUser($data)) {
                        // take the id
                        $userId = $this->adminModel->getUserIdByEmail($data['email']);

                        if($this->adminModel->registerAsAnAdmin($userId, $data)) {
                            // Redirect
                            flash('admin_access_request', '<center>You are registered. In order to take the access you must be verified by another admin.</center>');
                            
                            $_SESSION['new_admin_name'] = $data['name'];
                            $_SESSION['new_admin_email'] = $data['email'];
                            $_SESSION['new_admin_user_role'] = $data['user_role'];

                            redirect('Admins/adminRequestEmail/');
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
                    $this->view('admin/admin_register', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'profile_image' => '',
                    'profile_image_name' => '',
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'phn_no' => '',
                    'user_role' => '',

                    'profile_image_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phn_no_err' => '',
                    'user_role_err' => ''
                ];

                // Load view
                $this->view('admin/admin_register', $data);
            }
        }

        // Admin request email
        public function adminRequestEmail() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => trim($_POST['email']),

                    'email_err' => ''
                ];

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }
                else {
                    // Check email
                    if($this->adminModel->isAdminExist($data['email'])) {
                        if($data['email'] == $_SESSION['new_admin_email']) {
                            $data['email_err'] = 'You can not enter your email address as the requesting email address'; 
                        }                        
                    }
                    else {
                        $data['email_err'] = 'The email you entered is not belongs to any existing admin of the system'; 
                    }
                }

                // Make sure errors are empty
                if(empty($data['email_err'])) {
                    $new_admin_data = [
                        'name' => $_SESSION['new_admin_name'],
                        'email' => $_SESSION['new_admin_email'],
                        'user_role' => $_SESSION['new_admin_user_role']
                    ];

                    sendAdminVerificationCode($data['email'], $new_admin_data);

                    flash('requested', 'We sent a message to '.$data['email'].'. Please await for the request from that email.');

                    redirect('admins/adminRequestVerification');
                }
                else {
                    // Load view with errors
                    $this->view('admin/admin_request', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'email' => '',

                    'email_err' => ''
                ];
            }

            // Load view
            $this->view('admin/admin_request', $data);
        }

        // Admin request verificaiton
        public function adminRequestVerification() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => $_SESSION['admin_verification_sent_email'],
                    'otp' => trim($_POST['otp']),

                    'otp_err' => ''
                ];

                // Validate otp
                if(empty($data['otp'])) {
                    $data['otp_err'] = 'Please enter verification code';
                }

                if($data['otp'] != $_SESSION['admin_verification_code']) {
                    $data['otp_err'] = 'Your verification is not matched. Please try again';
                }

                // Make sure errors are empty
                if(empty($data['otp_err'])) {
                    // matched
                    $email = $_SESSION['new_admin_email'];

                    if($this->adminModel->setVerifiedAdmin($email)) {
                        // send an acknowledgemnet
                        $email = $_SESSION['admin_verification_sent_email'];

                        $new_admin_data = [
                            'name' => $_SESSION['new_admin_name'],
                            'email' => $_SESSION['new_admin_email'],
                            'user_role' => $_SESSION['new_admin_user_role']
                        ];

                        sendAdminAcknowledgement($email, $new_admin_data);
                        
                        // unset the sessions
                        unset($_SESSION['admin_verification_code']);
                        unset($_SESSION['admin_verification_sent_email']);
                        unset($_SESSION['new_admin_name']);
                        unset($_SESSION['new_admin_email']);
                        unset($_SESSION['new_admin_user_role']);

                        flash('verified', 'Your email verified successfully ! Now you can access as a new admin');
                        redirect('commons/login');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('admin/admin_request_verification', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'email' => '',
                    'otp' => '',

                    'otp_err' => ''
                ];
            }

            // Load view
            $this->view('admin/admin_request_verification', $data);
        }

        // Resend admin verification code
        public function adminResendVerificationCode() {
            $email = $_SESSION['admin_verification_sent_email'];

            $new_admin_data = [
                'name' => $_SESSION['new_admin_name'],
                'email' => $_SESSION['new_admin_email'],
                'user_role' => $_SESSION['new_admin_user_role']
            ];

            if(sendAdminVerificationCode($email, $new_admin_data)) {
                // resend success
                flash('resend_verification_successfull', 'Verification code resend succcessfully');
                redirect('Commons/userEmailVerification');
            }
            else {
                // resend failed
                flash('resend_verification_failed', 'Verification code resend failed! Check your internet connection or please try again waiting few minutes.', 'form-flash-warning');
                redirect('Commons/userEmailVerification');
            }
        }
    }
?>