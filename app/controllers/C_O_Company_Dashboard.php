<?php

class C_O_Company_Dashboard extends Controller {
    public function __construct() {
        $this->companyDashboardModel = $this->model('M_O_Company_Dashboard');

        $this->jobPostModel = $this->model('Post_JobAds');
        $this->cvModel = $this->model('M_O_C_Cv');
    }

    // Index
    public function index() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Organization'], ['Company']);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $posts_filter = trim($_POST['filter']);
            $posts_filter_order = trim($_POST['filter-order']);

            // jobs & cvs
            $JobsAmount = $this->companyDashboardModel->getCompanyJobsAmount();
            //$CvsAmount = $this->comapnyDashboardModel->getCvsAmount();
            
            // filtering
            $jobPosts = $this->jobPostModel->filterAndGetPosts($posts_filter, $posts_filter_order);
            //$cvs = $this->cvModel->filterAndGetPosts($posts_filter, $posts_filter_order);


            $data = [
                'jobs_amount' => $JobsAmount,
                //'cvs_amount' => $CvsAmount,

                'posts_filter' => $posts_filter,
                'posts_filter_order' => $posts_filter_order,

                'job_posts' => $jobPosts,
                //'cvs' => $cvs,
            ];
            
            $this->view('organization/company/company_dashboard', $data);
        }
        else {
            $posts_filter = 'ups';
            $posts_filter_order = 'desc';

            // jobs & cvs
            $JobsAmount = $this->companyDashboardModel->getCompanyJobsAmount();
            //$CvsAmount = $this->comapnyDashboardModel->getCvsAmount();
            
            // filtering
            $jobPosts = $this->jobPostModel->filterAndGetPosts($posts_filter, $posts_filter_order);
            //$cvs = $this->cvModel->filterAndGetPosts($posts_filter, $posts_filter_order);


            $data = [
                'jobs_amount' => $JobsAmount,

                'posts_filter' => $posts_filter,
                'posts_filter_order' => $posts_filter_order,

                'job_posts' => $jobPosts
            ];
            
            $this->view('organization/company/company_dashboard', $data);
        }
    }
}

?>