<?php

class C_S_OL_Qualified_Dashboard extends Controller {
    public function __construct() {
        $this->olQualifiedDashboardModel = $this->model('M_S_OL_Qualified_Dashboard');
    }

    // Index
    public function index() {
        $data = ['title' => 'Welcome to Students OL qualified dashboard'];
        
        $this->view('students/dashboards/v_student_ol_dashboard', $data);
    }
}

?>