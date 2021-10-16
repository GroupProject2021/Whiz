<?php

class C_O_C_Jobs extends Controller{

    public function __construct() {
        $this->jobModel = $this->model('M_O_C_Job');
        
    }

    public function index() {

        $post = $this->jobModel->getPosts();
            
        $data = [
            'posts' => $post
        ];

        $this->view('organization/company/jobs/index', $data);
    }


}



?>