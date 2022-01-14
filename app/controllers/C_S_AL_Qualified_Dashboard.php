<?php

class C_S_AL_Qualified_Dashboard extends Controller {
    public function __construct() {
        $this->alQualifiedDashboardModel = $this->model('M_S_AL_Qualified_Dashboard');
        $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
    }

    // Index
    public function index() {
        $followingList = $this->profileStatAndConnectionModel->getFollowings($_SESSION['user_id']);

        // Enrollments
        $profGuiderEnrollments = $this->alQualifiedDashboardModel->getProfGuiderEnrollments();
        $teacherEnrollments = $this->alQualifiedDashboardModel->getTeacherEnrollments();
        $jobEnrollments = $this->alQualifiedDashboardModel->getJobEnrollments();

        $data = [
            'following' => $followingList,
            'prof_guider_enrollments' => $profGuiderEnrollments,
            'teacher_enrollments' => $teacherEnrollments,
            'job_enrollments' => $jobEnrollments
        ];
        
        $this->view('students/dashboards/v_student_al_dashboard', $data);
    }
}

?>