<?php

class C_O_Company_Dashboard extends Controller {
    public function __construct() {
        $this->companyDashboardModel = $this->model('M_O_Company_Dashboard');
    }

    public function index() {
        $data = ['title' => 'Welcome to Company dashboard'];
        
        $this->view('organization/company/company_dashboard', $data);
    }
}

?>