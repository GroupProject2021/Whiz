<?php
    class Commons extends Controller {
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function registerRedirect() {
            $data = [];

            $this->view('common/user_register', $data);
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

            // redirect('students_dashboard/index');

            $this->userDashboardRedirect();
        }

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