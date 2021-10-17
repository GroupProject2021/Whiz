<?php

class C_O_U_Notices extends Controller{
    public function __construct() {
        $this->noticeModel = $this->model('M_O_U_Notice');        
    }

    // Index
    public function index() {
        $post = $this->noticeModel->getPosts();
            
        $data = [
            'posts' => $post
        ];

        $this->view('organization/university/notices/index', $data);
    }
}

?>