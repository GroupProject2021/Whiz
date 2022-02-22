<?php

class C_S_OL_Qualified_Dashboard extends Controller {
    public function __construct() {
        $this->olQualifiedDashboardModel = $this->model('M_S_OL_Qualified_Dashboard');
        $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
    }

    // Index
    public function index() {
        // Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Student'], ['OL qualified']);

        $followingList = $this->profileStatAndConnectionModel->getFollowings($_SESSION['user_id']);

       // Enrollments
       $profGuiderEnrollments = $this->olQualifiedDashboardModel->getProfGuiderEnrollments();
       $govCouseAmount = $this->olQualifiedDashboardModel->getGovCourseAmount();
       $priCouseAmount = $this->olQualifiedDashboardModel->getPriCourseAmount();

       // notices
       $notices = $this->olQualifiedDashboardModel->getNoticesFirstFiveOnly();

       $data = [
           'following' => $followingList,
           'prof_guider_enrollments' => $profGuiderEnrollments,
           'gov_course_amount' => $govCouseAmount,
           'pri_course_amount' => $priCouseAmount,
           'notices' => $notices
       ];
        
        $this->view('students/dashboards/v_student_ol_dashboard', $data);
    }
}

?>