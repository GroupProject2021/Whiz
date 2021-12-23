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

        $_SESSION['current_viewing_post_id'] = $post_id;
        $studentList = $this->enrolmentListModel->getStudentListById($post_id);
        $link = $this->enrolmentListModel->getSessionLink($post_id);
        // $post = $this->mentorDashboardModel->getPosts();

        switch($_SESSION['specialized_actor_type']) {
            case 'Professional Guider' :
                $enrollments = $this->enrolmentListModel->getEnrollmentsForAPostG($post_id);
                break;
            
            case 'Teacher' :
                $enrollments = $this->enrolmentListModel->getEnrollmentsForAPostT($post_id);
                break;

            default:
                // nothing
                break;
        }

        $data = [
            
            // 'post' => $post,
            // 'posts' => $post,
            'link' => $link,
            'list' => $studentList,
            'enrollments' => $enrollments
        ];

        $this->view('mentors/opt_enrolment_list/v_enrol_student_list', $data);
    }

    // upload link
    public function addlink() {

        $postId = $_SESSION['current_viewing_post_id'];
        $post = $this->mentorDashboardModel->getPostById($postId);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                
                'post_id' => $postId,
                'body' => trim($_POST['body']),

                'body_err' => ''
                
                
            ];

            // Validate body
            if(empty($data['body'])) {
                $data['body_err'] = 'Please enter link';
            }

            // Make sure no errors
            if(empty($data['body_err'])) {
                // Validated
                if($this->enrolmentListModel->addLink($data)) { // model needs to update
                    flash('post_message', 'Link Uploaded');
                    redirect('C_M_Enrolment_List/enrolStudentList'.$_SESSION['current_viewing_post_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('mentors/opt_enrolment_list/v_add_link', $data);
            }
        }
        else {
            $data = [
                'body' => '',
                'post' => $post
            ];
        }

        $this->view('mentors/opt_enrolment_list/v_add_link', $data);
    }

    public function viewlink () {

        $data = [
            
        ];

        $this->view('mentors/opt_enrolment_list/v_view_link', $data);
    }
}



?>