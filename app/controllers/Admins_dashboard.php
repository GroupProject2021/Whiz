<?php
    class Admins_dashboard extends Controller {
        public function __construct() {
            $this->adminDashboardModel = $this->model('Admins_dashboard');
        }

        public function index() {
            $posts = $this->adminDashboardModel->getPosts();
            $data = ['title' => 'Welcome to Admins dashboard', 'posts' => $posts];
            $this->view('admin/admin_dashboard', $data);
        }

        // Settings
        public function settings() {
            $id = $this->adminDashboardModel->findadminIdbyEmail($_SESSION['user_email']);

            switch($_SESSION['specialized_actor_type']) {
                // For admin
                case 'Admin':
                   $adminData = $this->adminDashboardModel->getAdminDetails($id);

                    $data = [
                        
                        'email' => $adminData->email,
                        'password' => $adminData->password,
                      
                    ];

                    $this->view('admins/settings/settings_for_admin', $data);
                    break;

                default:
                    break;
            }
            
        }

        public function editSettingsAdmin() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                   
                    'email_err' => '',
                    'password_err' => '',
                ];
                   
                // Validate body
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                // Validate body
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // Make sure no errors
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated                    
                    $id = $this->adminDashboardModel->findAdminIdbyEmail($_SESSION['user_email']);
                    if($this->adminDashboardModel->updateAdminSettings($id, $data)) {
                        flash('settings_message', 'Admin data updated');
                        redirect('admins_dashboard/settings');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('admins/settings/edit_settings_admin', $data);
                }
            }
            else {
                $id = $this->adminDashboardModel->findadminIdbyEmail($_SESSION['user_email']);
                // Get existing post from model                
                $adminData = $this->adminDashboardModel->getadminDetails($id);

                $data = [
                    'email' => $adminData->email,
                    'password' => $adminData->password,
                    
                    'email_err' => '',
                    'password_err' => '',
                   
                ];
            }

            $this->view('admins/settings/edit_settings_admin', $data);
        }       
    }
?>