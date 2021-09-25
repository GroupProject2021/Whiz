<?php
    class Organizations extends Controller {
        public function __construct() {
            $this->organizationModel = $this->model('Organization');
            $this->commonModel = $this->model('Common');
        }

        public function register() {
            $this->view('organization/organization_register', '');
        }

        public function university_register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'profile_image' => $_FILES['profile_image'],
                    'profile_image_name' => time().'_'.$_FILES['profile_image']['name'],
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

                    'profile_image_err' => '',
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

                // validate and upload profile image
                if(uploadImage($data['profile_image']['tmp_name'], $data['profile_image_name'], '/profileimages/organization/')) {
                    flash('profile_image_upload', 'Profile picture uploaded successfully');
                }
                else {
                    // upload unsuccessfull
                    $data['profile_image_err'] = 'Profile picture uploading unsuccessful';
                }

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
                else if (!str_contains($data['email'],'@')){
                    $data['email_err'] = 'Enter valid email'; 
                }
                // Check email
                else if($this->commonModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken'; 
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
                else if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }

                // Validate phone number
                if(empty($data['phn_no'])) {
                    $data['phn_no_err'] = 'Please enter phone number';
                }

                // Validate website
                if(empty($data['website'])) {
                    $data['website_err'] = 'Please enter website';
                }

                // Validate founder
                if(empty($data['founder'])) {
                    $data['founder_err'] = 'Please enter founder';
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
                    $data['type_err'] = 'Please select company type';
                }

                // Make sure errors are empty
                if(empty($data['profile_image_err']) && empty($data['uniname_err']) && empty($data['address_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) 
                && empty($data['phn_no_err']) && empty($data['website_err']) && empty($data['founded_year_err']) && empty($data['founder_err']) && empty($data['approved_err']) 
                && empty($data['rank_err']) && empty($data['amount_err']) && empty($data['rate_err']) && empty($data['descrip_err']) && empty($data['type_err']) ) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->organizationModel->university_register($data)) {
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
                    // Load view with errors
                    $this->view('organization/university/university_register', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'profile_image' => '',
                    'profile_image_name' => '',
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

                    'profile_image_err' => '',
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

        public function company_register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'profile_image' => $_FILES['profile_image'],
                    'profile_image_name' => time().'_'.$_FILES['profile_image']['name'],
                    'comname' => trim($_POST['comname']),
                    'address' => trim($_POST['address']),
                    'email' => trim($_POST['email']),                    
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'phn_no' => trim($_POST['phn_no']),
                    'website' => trim($_POST['website']),
                    'founder' => trim($_POST['founder']),
                    'founded_year' => trim($_POST['founded_year']),
                    'registered' => trim($_POST['registered']),
                    'cur_emp' => trim($_POST['cur_emp']),
                    'emp_size' => trim($_POST['emp_size']),
                    'overview' => trim($_POST['overview']),
                    'services' => trim($_POST['services']),

                    'profile_image_err' => '',
                    'comname_err' => '',
                    'address_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phn_no_err' => '',
                    'website_err' => '',
                    'founder_err' => '',
                    'founded_year_err' => '',
                    'registered_err' => '',
                    'cur_emp_err' => '',
                    'emp_size_err' => '',
                    'overview_err' => '',
                    'services_err' => ''
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
                if(empty($data['comname'])) {
                    $data['comname_err'] = 'Please enter name';
                }

                // Validate address
                if(empty($data['address'])) {
                    $data['address_err'] = 'Please enter address';
                }

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }
                else if (!str_contains($data['email'],'@')){
                    $data['email_err'] = 'Enter valid email'; 
                }
                // Check email
                else if($this->commonModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken'; 
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

                 // Validate founder
                 if(empty($data['founder'])) {
                    $data['founder_err'] = 'Please enter founder';
                }

                // Validate founded_year
                if(empty($data['founded_year'])) {
                    $data['founded_year_err'] = 'Please enter founded year';
                }

                // Validate registered
                if(empty($data['registered'])) {
                    $data['registered_err'] = 'Please select registered or not';
                }

                // Validate current emp
                if(empty($data['cur_emp'])) {
                    $data['cur_emp_err'] = 'Please enter no. of employees';
                }

                // Validate emp amount
                if(empty($data['emp_size'])) {
                    $data['emp_size_err'] = 'Please enter employees amount';
                }
                else {
                    if($data['emp_size'] < $data['cur_emp']) {
                        $data['emp_size_err'] = 'Please enter valid employees amount less than current employees';
                    }
                }

                // Validate overview
                if(empty($data['overview'])) {
                    $data['overview'] = 'Please enter overview';
                }

                // Validate type
                if(empty($data['services'])) {
                    $data['services_err'] = 'Please enter services';
                }

                // Make sure errors are empty
                if(empty($data['profile_image_err']) && empty($data['comname_err']) && empty($data['address_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) 
                && empty($data['phn_no_err']) && empty($data['website_err']) && empty($data['founded_year_err']) && empty($data['founder_err']) && empty($data['registered_err']) 
                && empty($data['cur_emp_err']) && empty($data['emp_size_err']) && empty($data['overview_err']) && empty($data['services_err'])) {
                    // Validated
                    
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->organizationModel->company_register($data)) {
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
                    // Load view with errors
                    $this->view('organization/company/company_register', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'profile_image' => '',
                    'profile_image_name' => '',
                    'comname' => '',
                    'address' => '',
                    'email' => '',                    
                    'password' => '',
                    'confirm_password' => '',
                    'phn_no' => '',
                    'website' => '',
                    'founder' => '',
                    'founded_year' => '',
                    'registered' => '',
                    'cur_emp' => '',
                    'emp_size' => '',
                    'overview' => '',
                    'services' => '',

                    'profile_image_err' => '',
                    'comname_err' => '',
                    'address_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phn_no_err' => '',
                    'website_err' => '',
                    'founder_err' => '',
                    'founded_year_err' => '',
                    'registered_err' => '',
                    'cur_emp_err' => '',
                    'emp_size_err' => '',
                    'overview_err' => '',
                    'services_err' => ''
                ];

                // Load view
                $this->view('organization/company/company_register', $data);
            }
        }
    }
?>
        