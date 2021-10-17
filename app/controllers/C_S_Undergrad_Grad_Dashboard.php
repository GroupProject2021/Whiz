<?php

class C_S_Undergrad_Grad_Dashboard extends Controller {
    public function __construct() {
        $this->beginnerDashboardModel = $this->model('M_S_Beginner_Dashboard');
    }

    // Index
    public function index() {
        $data = ['title' => 'Welcome to Students undergraduate graduate dashboard'];
        
        $this->view('students/dashboards/v_student_ug_dashboard', $data);
    }
}

?>