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
    }
?>