<?php

class C_S_OL_Qualified_Dashboard extends Controller {
    public function __construct() {
        $this->olQualifiedDashboardModel = $this->model('M_S_OL_Qualified_Dashboard');
        $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
    }

    // Index
    public function index() {
        $followingList = $this->profileStatAndConnectionModel->getFollowings($_SESSION['user_id']);

        $data = ['following' => $followingList];
        
        $this->view('students/dashboards/v_student_ol_dashboard', $data);
    }
}

?>