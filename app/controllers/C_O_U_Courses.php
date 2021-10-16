<?php

class C_O_U_Courses extends Controller{

    public function __construct() {
        $this->courseModel = $this->model('M_O_U_Course');
        
    }

    public function index() {

        $post = $this->courseModel->getPosts();
            
        $data = [
            'posts' => $post
        ];

        $this->view('organization/university/course/index', $data);
    }


}



?>