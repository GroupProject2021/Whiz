<?php

class C_M_Enrolment_List extends Controller{

    public function __construct() {
        $this->enrolmentListModel = $this->model('M_M_Enrolment_List');
        $this->mentorDashboardModel = $this->model('Mentor_dashboard');
    }

    public function index() {
        switch($_SESSION['specialized_actor_type']) {
            case 'Professional Guider' :
                $post = $this->mentorDashboardModel->getBanners();
                break;
            
            case 'Teacher' :
                $post = $this->mentorDashboardModel->getPosters();
                break;

            default:
                // nothing
                break;
        }
            
        $data = [
            'posts' => $post
        ];

        $this->view('mentors/opt_enrolment_list/v_enrolment_list', $data);
    }
}



?>