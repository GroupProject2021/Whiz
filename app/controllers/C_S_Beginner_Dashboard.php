<?php

class C_S_Beginner_Dashboard extends Controller {
    public function __construct() {
        $this->beginnerDashboardModel = $this->model('M_S_Beginner_Dashboard');
        $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
    }

    // Index
    public function index() {
        $followingList = $this->profileStatAndConnectionModel->getFollowings($_SESSION['user_id']);

        // Enrollments
       $profGuiderEnrollments = $this->beginnerDashboardModel->getProfGuiderEnrollments();
       $govCouseAmount = $this->beginnerDashboardModel->getGovCourseAmount();
       $priCouseAmount = $this->beginnerDashboardModel->getPriCourseAmount();

       // notices
       $notices = $this->beginnerDashboardModel->getNoticesFirstFiveOnly();

       $data = [
           'following' => $followingList,
           'prof_guider_enrollments' => $profGuiderEnrollments,
           'gov_course_amount' => $govCouseAmount,
           'pri_course_amount' => $priCouseAmount,
           'notices' => $notices
       ];
        
        $this->view('students/dashboards/v_student_beg_dashboard', $data);
    }
}

?>