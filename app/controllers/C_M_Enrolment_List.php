<?php

class C_M_Enrolment_List extends Controller{

    public function __construct() {
        $this->enrolmentListModel = $this->model('M_M_Enrolment_List');
    }

    public function index() {
        $post = $this->enrolmentListModel->getPosts();
            
        $data = [
            'posts' => $post
        ];

        $this->view('mentors/opt_enrolment_list/v_enrolment_list', $data);
    }
}



?>