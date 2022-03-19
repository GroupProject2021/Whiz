<?php

class C_O_University_Dashboard extends Controller {
    public function __construct() {
        $this->universityDashboardModel = $this->model('M_O_University_Dashboard');

        $this->coursePostModel = $this->model('Post_CoursePosts');
        $this->intakeNoticesModel = $this->model('Post_IntakeNotices');
    }

    // Index
    public function index() {        
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Organization'], ['University']);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $posts_filter = trim($_POST['filter']);
            $posts_filter_order = trim($_POST['filter-order']);

            // courses & intake notices
            $coursesAmount = $this->universityDashboardModel->getUniversityCoursesAmount();
            $intakeNoticesAmount = $this->universityDashboardModel->getIntakeNoticesAmount();
            
            // filtering
            $coursePosts = $this->coursePostModel->filterAndGetPosts($posts_filter, $posts_filter_order);
            $intakeNotices = $this->intakeNoticesModel->filterAndGetPosts($posts_filter, $posts_filter_order);


            $data = [
                'courses_amount' => $coursesAmount,
                'intake_notices_amount' => $intakeNoticesAmount,

                'posts_filter' => $posts_filter,
                'posts_filter_order' => $posts_filter_order,

                'course_posts' => $coursePosts,
                'intake_notices' => $intakeNotices,
            ];
            
            $this->view('organization/university/university_dashboard', $data);
        }
        else {
            $posts_filter = 'ups';
            $posts_filter_order = 'desc';

            // courses & intake notices
            $coursesAmount = $this->universityDashboardModel->getUniversityCoursesAmount();
            $intakeNoticesAmount = $this->universityDashboardModel->getIntakeNoticesAmount();
            
            // filtering
            $coursePosts = $this->coursePostModel->filterAndGetPosts($posts_filter, $posts_filter_order);
            $intakeNotices = $this->intakeNoticesModel->filterAndGetPosts($posts_filter, $posts_filter_order);


            $data = [
                'courses_amount' => $coursesAmount,
                'intake_notices_amount' => $intakeNoticesAmount,

                'posts_filter' => $posts_filter,
                'posts_filter_order' => $posts_filter_order,

                'course_posts' => $coursePosts,
                'intake_notices' => $intakeNotices,
            ];
            
            $this->view('organization/university/university_dashboard', $data);
        }
    }
}

?>