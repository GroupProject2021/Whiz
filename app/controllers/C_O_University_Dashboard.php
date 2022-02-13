<?php

class C_O_University_Dashboard extends Controller {
    public function __construct() {
        $this->universityDashboardModel = $this->model('M_O_University_Dashboard');

        $this->coursePostModel = $this->model('Post_CoursePosts');
        $this->intakeNoticesModel = $this->model('M_O_U_Notice');
    }

    // Index
    public function index($coursePosts_filter = 'ups', $intakeNotices_filter = 'ups') {
        // courses & intake notices
        $coursesAmount = $this->universityDashboardModel->getUniversityCoursesAmount();
        $intakeNoticesAmount = $this->universityDashboardModel->getIntakeNoticesAmount();

        switch($coursePosts_filter) {
            case 'ups': 
                $coursePosts = $this->coursePostModel->getTopPostsToDashboardUsingFilterByUps();
                break;

            case 'downs': 
                $coursePosts = $this->coursePostModel->getTopPostsToDashboardUsingFilterByDowns();
                break;

            case 'comments': 
                $coursePosts = $this->coursePostModel->getTopPostsToDashboardUsingFilterByComments();
                break;

            case 'reviews': 
                $coursePosts = $this->coursePostModel->getTopPostsToDashboardUsingFilterByReviews();
                break;

            default:
                // nothing;
        }

        switch($intakeNotices_filter) {
            case 'ups': 
                $intakeNotices = $this->intakeNoticesModel->getTopPostsToDashboardUsingFilterByUps();
                break;

            case 'downs': 
                $intakeNotices = $this->intakeNoticesModel->getTopPostsToDashboardUsingFilterByDowns();
                break;

            case 'comments': 
                $intakeNotices = $this->intakeNoticesModel->getTopPostsToDashboardUsingFilterByComments();
                break;

            case 'reviews': 
                $intakeNotices = $this->intakeNoticesModel->getTopPostsToDashboardUsingFilterByReviews();
                break;

            default:
                // nothing;
        }


        $data = [
            'courses_amount' => $coursesAmount,
            'intake_notices_amount' => $intakeNoticesAmount,

            'course_posts' => $coursePosts,
            'intake_notices' => $intakeNotices
        ];
        
        $this->view('organization/university/university_dashboard', $data);
    }
}

?>