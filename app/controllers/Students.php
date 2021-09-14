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

                echo $data['password'];

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
                    if($this->studentModel->register($data)) {
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
                    $this->view('students/student_register', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'profile_image' => '',
                    'profile_image' => '',
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

        public function sendVerificationEmail($toEmail, $name, $email, $message) {
            $toEmail = $toEmail;
            $subject = "Verification email from Whiz";
            $body = "<h2>Verification</h2>
                    <p>Name </p>".$name."
                    <p>Email </p>".$email."
                    <p>Message </p>".$message."
            ";

            // Email headers
            $headers = "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8"."\r\n";

            // additional headers
            $headers .= "From: ".$name."<".$email.">"."\r\n";

            if(mail($toEmail, $subject, $body, $headers)) {
                // email sent
                $msg = "Your email successfully sent";
                echo $msg;
            }
            else {
                // email not sent
                $msg = "Your not sent";
                echo $msg;
            }
        }        
    }
?>