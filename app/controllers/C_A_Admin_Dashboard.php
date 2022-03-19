<?php

class C_A_Admin_Dashboard extends Controller {
    public function __construct() {
        $this->adminDashboardModel = $this->model('M_A_Admin_Dashboard');
    }

    // Index
    public function index() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        $data = ['title' => 'Welcome to Students beginner dashboard'];
        
        $this->view('admin/dashboards/v_admin_dashboard', $data);
    }
}

?>