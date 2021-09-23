<?php
    class Commons extends Controller {
        public function __construct() {
            $this->userModel = $this->model('User');
            $this->commonModel = $this->model('Common');
        }

        // email verificaitons
        public function userEmailVerification() {
            $_SESSION['verification_sent_email'] = 'dhanushkasandakelum711@gmail.com';
            
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

                // Validate email
                if(empty($data['otp'])) {
                    $data['otp_err'] = 'Please enter verification code';
                }

                // Validate password
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
                    'email' => $_SESSION['verification_sent_email'],
                    'otp' => '',

                    'otp_err' => ''
                ];
            }

            // Load view
            $this->view('common/user_email_verification', $data);
        }

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

        public function registerRedirect() {
            $data = [];

            $this->view('common/user_register', $data);
        }


        // user log in
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

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // Check for user/email
                if($this->userModel->findUserByEmail($data['email'])) {
                    // User found
                }
                else {
                    //user not found
                    $data['email_err'] = 'No user found';
                }

                if($data['captcha_value'] != "true") {
                    $data['captcha_value_err'] = 'Captcha not matched, Please try again';
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err']) && empty($data['captcha_value_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

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

        public function createUserSession($user) {
            // taken from the database
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_profile_image'] = $user->profile_image;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['actor_type'] = $user->actor_type;
            $_SESSION['specialized_actor_type'] = $user->specialized_actor_type;
            $_SESSION['status'] = $user->status;

            // redirect('students_dashboard/index');

            $this->userDashboardRedirect();
        }


        // dashboard redirections
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
                    redirect('admins_dashboard/index');
                    break;
                default:
                    // nothing
                    break;
            }
        }


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

        public function organizationDashboardRedirect() {

        }

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
            session_destroy();

            // redirect('students/login');
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


        // user forgot password
        public function forgetPassword() {
            $receiver = "dhanushkasandakelum711@gmail.com";
            $subject = "Forget password";
            $body = "hi there";
            $sender = "From:segroupproject2021@gmail.com";

            if(mail($receiver, $subject, $body, $sender)) {
                echo "success";
            }
            else {
                echo "failed";
            }
        }


    }
?>