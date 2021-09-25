<?php

class C_S_Enrolment_List extends Controller{

    public function __construct() {
        $this->enrolmentListModel = $this->model('M_S_Enrolment_List');
    }

    public function index() {
        $list = $this->enrolmentListModel->getPosts();
            
        $data = [
            'lists' => $list
        ];

        $this->view('mentors/opt_enrolment_list/v_enrolment_list', $data);
    }
}



?>