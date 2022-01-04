<?php

class C_S_Beginner_Dashboard extends Controller {
    public function __construct() {
        $this->beginnerDashboardModel = $this->model('M_S_Beginner_Dashboard');
        $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
    }

    // Index
    public function index() {
        $followingList = $this->profileStatAndConnectionModel->getFollowings($_SESSION['user_id']);

        $data = ['following' => $followingList];
        
        $this->view('students/dashboards/v_student_beg_dashboard', $data);
    }
}

?>