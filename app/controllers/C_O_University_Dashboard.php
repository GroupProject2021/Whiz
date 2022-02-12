<?php

class C_O_University_Dashboard extends Controller {
    public function __construct() {
        $this->universityDashboardModel = $this->model('M_O_University_Dashboard');
    }

    // Index
    public function index() {
        $data = ['title' => 'Welcome to Universiversity dashboard'];

        // courses & intake notices
        $coursesAmount = $this->universityDashboardModel->getUniversityCoursesAmount();
        $intakeNoticesAmount = $this->universityDashboardModel->getIntakeNoticesAmount();

        $data = [
            'courses_amount' => $coursesAmount,
            'intake_notices_amount' => $intakeNoticesAmount
        ];
        
        $this->view('organization/university/university_dashboard', $data);
    }
}

?>