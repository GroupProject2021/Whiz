<?php

class C_S_Undergrad_Grad_Dashboard extends Controller {
    public function __construct() {
        $this->undergradGradDashboardModel = $this->model('M_S_Undergrad_Grad_Dashboard');
        $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
    }

    // Index
    public function index() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Student'], ['Undergraduate Graduate']);

        $followingList = $this->profileStatAndConnectionModel->getFollowings($_SESSION['user_id']);

        // Enrollments
        $profGuiderEnrollments = $this->undergradGradDashboardModel->getProfGuiderEnrollments();
        $jobEnrollments = $this->undergradGradDashboardModel->getJobEnrollments();

        $data = [
            'following' => $followingList,
            'prof_guider_enrollments' => $profGuiderEnrollments,
            'job_enrollments' => $jobEnrollments
        ];
        
        $this->view('students/dashboards/v_student_ug_dashboard', $data);
    }
}

?>