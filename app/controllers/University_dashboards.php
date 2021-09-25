<?php

class University_dashboards extends Controller {
    public function __construct() {
        $this->universityDashboardModel = $this->model('University_dashboard');
    }

    public function index() {
        $data = ['title' => 'Welcome to Universiversity dashboard'];
        
        $this->view('organization/university/university_dashboard', $data);
    }
}

?>