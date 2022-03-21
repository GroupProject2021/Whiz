<?php

class C_A_Admin_Dashboard extends Controller {
    public function __construct() {
        $this->adminDashboardModel = $this->model('M_A_Admin_Dashboard');
    }

    // Index
    public function index() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        // User data

        $data = [
            'total_user_amount' => $this->adminDashboardModel->getTotalUserAmount(),
            'beginner_amount' => $this->adminDashboardModel->getUserAmountBySpecialzedActorType('Beginner'),
            'ol_qualifed_amount' => $this->adminDashboardModel->getUserAmountBySpecialzedActorType('OL Qualified'),
            'al_qualifed_amount' => $this->adminDashboardModel->getUserAmountBySpecialzedActorType('AL Qualified'),
            'undergrad_grad_amount' => $this->adminDashboardModel->getUserAmountBySpecialzedActorType('Undergraduate Graduate'),

            'university_amount' => $this->adminDashboardModel->getUserAmountBySpecialzedActorType('University'),
            'company_amount' => $this->adminDashboardModel->getUserAmountBySpecialzedActorType('Company'),

            'pro_guider_amount' => $this->adminDashboardModel->getUserAmountBySpecialzedActorType('Professional Guider'),
            'teacher_amount' => $this->adminDashboardModel->getUserAmountBySpecialzedActorType('Teacher'),

            'total_post_amount' => $this->adminDashboardModel->getTotalPostAmount(),
            'course_post_amount' => $this->adminDashboardModel->getPostAmountViaPostType('coursepost'),
            'intake_notice_amount' => $this->adminDashboardModel->getPostAmountViaPostType('noticepost'),
            'job_ads_amount' => $this->adminDashboardModel->getPostAmountViaPostType('jobpost'),
            'banner_amount' => $this->adminDashboardModel->getPostAmountViaPostType('banner'),
            'poster_amount' => $this->adminDashboardModel->getPostAmountViaPostType('poster')
        ];
        
        $this->view('admin/dashboards/v_admin_dashboard', $data);
    }

    public function Users() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        $users = $this->adminDashboardModel->getUserList();

        $data = [
            'title' => 'User List',
            'users' => $users
        ];
        
        $this->view('admin/dashboards/v_user_lists', $data);
    }

    public function UsersViaActorTypes($actor_type) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        $users = $this->adminDashboardModel->getUserListViaActorType($actor_type);

        $data = [
            'title' => $actor_type.' List',
            'users' => $users
        ];
        
        $this->view('admin/dashboards/v_user_lists', $data);
    }

    public function UsersViaSpecializedActorTypes($specialized_actor_type) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        switch($specialized_actor_type) {
            case 'Beginner':
                $type_to_be_searched = 'Beginner';
                break;

            case 'OL':
                $type_to_be_searched = 'OL Qualified';
                break;

            case 'AL':
                $type_to_be_searched = 'AL Qualified';
                break;   
                
            case 'UG':
                $type_to_be_searched = 'Undergraduate Graduate';
                break;

            case 'University':
                $type_to_be_searched = 'University';
                break;

            case 'Company':
                $type_to_be_searched = 'Company';
                break;

            case 'ProGuider':
                $type_to_be_searched = 'Professional Guider';
                break;   
                
            case 'Teacher':
                $type_to_be_searched = 'Teacher';
                break;

            default:
                break;
        }

        $users = $this->adminDashboardModel->getUserListViaSpecializedActorType($type_to_be_searched);

        $data = [
            'title' => $type_to_be_searched.' List',
            'users' => $users
        ];
        
        $this->view('admin/dashboards/v_user_lists', $data);
    }
}

?>