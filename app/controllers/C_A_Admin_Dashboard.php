<?php

class C_A_Admin_Dashboard extends Controller {
    public function __construct() {
        $this->adminDashboardModel = $this->model('M_A_Admin_Dashboard');
    }

    // Index
    public function index() {
        $data = ['title' => 'Welcome to Students beginner dashboard'];
        
        $this->view('admin/dashboards/v_admin_dashboard', $data);
    }
}

?>