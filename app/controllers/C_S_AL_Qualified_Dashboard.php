<?php

class C_S_AL_Qualified_Dashboard extends Controller {
    public function __construct() {
        $this->alQualifiedDashboardModel = $this->model('M_S_AL_Qualified_Dashboard');
    }

    // Index
    public function index() {
        $data = ['title' => 'Welcome to Students aL qualified dashboard'];
        
        $this->view('students/dashboards/v_student_al_dashboard', $data);
    }
}

?>