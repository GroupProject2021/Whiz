<?php

class C_O_C_Cvs extends Controller{
    public function __construct() {
        $this->cvModel = $this->model('M_O_C_Cv');        
    }

    // Index
    public function index() {

        $post = $this->cvModel->getPosts();
            
        $data = [
            'posts' => $post
        ];

        $this->view('organization/company/cv/index', $data);
    }
}



?>