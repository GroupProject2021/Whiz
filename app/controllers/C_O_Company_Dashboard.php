<?php

class C_O_Company_Dashboard extends Controller {
    public function __construct() {
        $this->companyDashboardModel = $this->model('M_O_Company_Dashboard');
    }

    // Index
    public function index() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Organization'], ['Company']);
        
        $data = ['title' => 'Welcome to Company dashboard'];
        
        $this->view('organization/company/company_dashboard', $data);
    }
}

?>