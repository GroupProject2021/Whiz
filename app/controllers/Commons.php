<?php
    class Commons extends Controller {
        public function __construct() {
            //$this->userModel = $this->model('User');
            $this->commonModel = $this->model('Common');
        }

        // email verificaitons
        public function userEmailVerification() {            
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => $_SESSION['verification_sent_email'],
                    'otp' => trim($_POST['otp']),

                    'otp_err' => ''
                ];

                // Validate otp
                if(empty($data['otp'])) {
                    $data['otp_err'] = 'Please enter verification code';
                }

                if($data['otp'] != $_SESSION['verification_code']) {
                    $data['otp_err'] = 'Your verification is not matched. Please try again';
                }

                // Make sure errors are empty
                if(empty($data['otp_err'])) {
                    // matched
                    if($this->commonModel->setVerifiedUser($data['email'])) {
                        // unset the sessions
                        unset($_SESSION['verification_code']);
                        unset($_SESSION['verification_sent_email']);

                        flash('verified', 'Your email verified successfully !');
                        redirect('commons/login');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('common/user_email_verification', $data);
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
            $this->view('common/user_email_verification', $data);
        }

        // Resend verification code
        public function resendVerificationCode() {
            $email = $_SESSION['verification_sent_email'];

            if(sendVerificationCode($email)) {
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

        // Register redirection
        public function registerRedirect() {
            $data = [];

            $this->view('common/user_register', $data);
        }


        // User login
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
                    'captcha_value' => trim($_POST['captcha_value']),

                    'email_err' => '',
                    'password_err' => '',
                    'captcha_value_err' => ''
                ];

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }
                // Check for user/email
                else if($this->commonModel->findUserByEmail($data['email'])) {
                    // User found
                }
                else {
                    //user not found
                    $data['email_err'] = 'No user found';
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                if($data['captcha_value'] != "true") {
                    $data['captcha_value_err'] = 'Captcha not matched, Please try again';
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err']) && empty($data['captcha_value_err'])) {
                // if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->commonModel->login($data['email'], $data['password']);

                    if($loggedInUser) {
                        // Create session
                        $this->createUserSession($loggedInUser);
                    }
                    else {
                        $data['password_err'] = 'Password incorrect';

                        $this->view('common/user_login', $data);
                    }
                }
                else {
                    // Load view with errors
                    $this->view('common/user_login', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'captcha_value' => '',

                    'email_err' => '',
                    'password_err' => '',
                    'captcha_value_err' => '',
                ];
            }

            // Load view
            $this->view('common/user_login', $data);
        }

        // User session instantiation
        public function createUserSession($user) {
            // taken from the database
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_profile_image'] = $user->profile_image;
            $_SESSION['user_name'] = $user->first_name;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['actor_type'] = $user->actor_type;
            $_SESSION['specialized_actor_type'] = $user->specialized_actor_type;
            $_SESSION['status'] = $user->status;

            // redirect('students_dashboard/index');

            $this->userDashboardRedirect();
        }


        // Dashboard redirections
        public function userDashboardRedirect() {
            switch($_SESSION['actor_type']) {
                case "Student": 
                    // redirect('students_dashboard/index');
                    $this->studentDashboardRedirect();
                    break;
                case "Organization": 
                    // redirect('organizations_dashboard/index');
                    $this->organizationDashboardRedirect();
                    break;
                case "Mentor": 
                    // redirect('mentors_dashboard/index');
                    $this->mentorDashboardRedirect();
                    break;
                case "Admin": 
                    redirect('C_A_Admin_Dashboard/index');
                    break;
                default:
                    // nothing
                    break;
            }
        }

        // Student dashboard redirection
        public function studentDashboardRedirect() {
            $data = ['title' => 'Welcome to Students beginner dashboard'];

            switch($_SESSION['specialized_actor_type']) {
                case 'Beginner' :
                    redirect('C_S_Beginner_Dashboard/index');
                    break;
                
                case 'OL qualified' :
                    redirect('C_S_OL_Qualified_Dashboard/index');
                    break;
                
                case 'AL qualified' :
                    redirect('C_S_AL_Qualified_Dashboard/index');
                    break;

                case 'Undergraduate Graduate' :
                    redirect('C_S_Undergrad_Grad_Dashboard/index');
                    break;

                default:
                    // nothing
                    break;
            }
        }

        // Organization dashboard redirection
        public function organizationDashboardRedirect() {
            $data = ['title' => 'Welcome to Organization dashboard'];

            switch($_SESSION['specialized_actor_type']) {
                case 'University' :
                    redirect('C_O_University_Dashboard/index');
                    break;
                
                case 'Company' :
                    redirect('C_O_Company_Dashboard/index');
                    break;

                default:
                    // nothing
                    break;
            }

        }

        // Mentor dashboard redirection
        public function mentorDashboardRedirect() {
            $data = ['title' => 'Welcome to Mentor dashboard'];

            switch($_SESSION['specialized_actor_type']) {
                case 'Professional Guider' :
                    redirect('Mentors_dashboard/index');
                    break;
                
                case 'Teacher' :
                    redirect('Mentors_dashboard/index');
                    break;

                default:
                    // nothing
                    break;
            }
        }


        // user log out
        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            unset($_SESSION['actor_type']);
            unset($_SESSION['specialized_actor_type']);
            unset($_SESSION['status']);
            unset($_SESSION['user_profile_image']);
            session_destroy();

            // redirect('students/login');
            redirect('commons/login');
        }

        // Check user login or not
        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            }
            else {
                return false;
            }
        }    


        // User forgot password
        public function forgetPassword() {
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

                // Check for user/email
                if($this->commonModel->findUserByEmail($data['email'])) {
                    // User found
                }
                else {
                    //user not found
                    $data['email_err'] = 'No user found';
                }

                // Make sure errors are empty
                if(empty($data['email_err'])) {
                    if(sendPasswordReset($data['email'])) {
                        // resend success
                        flash('send_password_reset_successfull', 'We have sent password reset email. Please check your inbox.');
                    }
                    else {
                        // resend failed
                        flash('send_password_reset_failed', 'Password reset email sending failed! Check your internet connection or please try again waiting few minutes.', 'form-flash-warning');
                    }

                    // redirect('Commons/userPasswordReset');
                }
                else {
                    // Load view with errors
                    $this->view('common/user_forgot_password', $data);
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
            $this->view('common/user_forgot_password', $data);
        }

        // User password reset
        public function userPasswordReset() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

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

                // Make sure errors are empty
                if(empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Hash password - Using strog one way hashing algorithm
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->commonModel->resetPassword($_SESSION['password_reset_sent_email'], $data['password'])) {
                        // Redirect
                        flash('reset_success', 'Password reset successfully! ');
                        redirect('Commons/login');
                    }
                    else {
                        die('Something went wrong');
                    }

                    redirect('Commons/login');
                }
                else {
                    // Load view with errors
                    $this->view('common/user_reset_password', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'password' => '',
                    'confirm_password' => '',

                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
            }

            // Load view
            $this->view('common/user_reset_password', $data);
        }



        // report
        public function report($reportedId, $reporterId) {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'reported_id' => $reportedId,
                    'reporter_id' => $reporterId,
                    'report' => trim($_POST['report'])
                ];

                if($this->commonModel->sendReport($data)){
                    flash('post_message', 'Profile Reported');
                    redirect('Commons/reportProfileRedirect/'.$reportedId.'/'.$reporterId);
                }
                else{
                    die('Something went wrong');
                }
            }
        }

        public function reportProfileRedirect($reportedId, $reporterId){
            $profile = $this->commonModel->getUserById($reportedId);

            if($profile->actor_type == 'Student'){
                redirect('C_S_Settings/settings/'.$reportedId.'/'.$reporterId);
            }
            else if($profile->actor_type == 'Organization'){
                redirect('C_O_Settings/settings/'.$reportedId.'/'.$reporterId);
            }
            else if($profile->actor_type == 'Mentor'){
                redirect('C_M_Settings/settings/'.$reportedId.'/'.$reporterId);
            }
        }
    }
?>