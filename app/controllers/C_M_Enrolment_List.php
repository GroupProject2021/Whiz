<?php

class C_M_Enrolment_List extends Controller{

    public function __construct() {
        $this->enrolmentListModel = $this->model('M_M_Enrolment_List');
        $this->mentorDashboardModel = $this->model('Post');
        
    }

    // Index
    public function index() {
        switch($_SESSION['specialized_actor_type']) {
            case 'Professional Guider' :
                $post = $this->mentorDashboardModel->getPosts();
                break;
            
            case 'Teacher' :
                $post = $this->mentorDashboardModel->getPosts();
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

    // Enroll list
    public function enrolStudentList($post_id) {

        // $post = $this->mentorDashboardModel->getPostById($id);
        // $userId = $_SESSION['user_id'];
        $studentList = $this->enrolmentListModel->getStudentListById($post_id);

        $data = [
            
            // 'post' => $post,
            'list' => $studentList
        ];

        $this->view('mentors/opt_enrolment_list/v_enrol_student_list', $data);
    }
}



?>