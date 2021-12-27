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
        $sessionTitle = $this->enrolmentListModel->getPostById($post_id);
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
            'enrollments' => $enrollments,
            'title' => $sessionTitle->title
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
                'post' => $post,
                'title' => $post->title
            ];
        }

        $this->view('mentors/opt_enrolment_list/v_add_link', $data);
    }

    public function viewlink () {

        $postId = $_SESSION['current_viewing_post_id'];
        // $post = $this->mentorDashboardModel->getPostById($postId);
        $sessionData = $this->enrolmentListModel->getSessionLink($postId);
        $sessionTitle = $this->enrolmentListModel->getPostById($postId);
        
        $data = [
            'link' => $sessionData->body,
            'title' => $sessionTitle->title
        ];

        $this->view('mentors/opt_enrolment_list/v_view_link', $data);
    }

    public function editlink() {

        $postId = $_SESSION['current_viewing_post_id'];
        $post = $this->enrolmentListModel->getPostById($postId);
        $link = $this->enrolmentListModel->getSessionLink($postId);


        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id'=> $link->id,
                'post_id' => $postId,
                'body' => trim($_POST['link']),
                'title' => $post->title,

                'body_err' => ''
            ];

            // validate link
            if(empty($data['body'])) {
                $data['body_err'] = 'Please enter link';
            }

            // Make sure no errors
            if(empty($data['body_err'])) {
                // Validated                    
                // $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);
                if($this->enrolmentListModel->updateLink($data)) {
                    flash('settings_message', 'Link updated');
                    redirect('C_M_Enrolment_List/enrolStudentList'.$_SESSION['current_viewing_post_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('mentors/opt_enrolment_list/v_edit_link', $data);
            }
        }
        else {
            
            // Get existing post from model                
            // $mentorData = $this->mentorSettingsModel->getMentorDetails($id);
            // $postId = $_SESSION['current_viewing_post_id'];
            $post = $this->enrolmentListModel->getPostById($postId);
            $link = $this->enrolmentListModel->getSessionLink($postId);

            if($link->post_id != $postId) {
                redirect('C_M_Enrolment_List/enrolStudentList'.$_SESSION['current_viewing_post_id']);
            }

            $data = [
                'id' => $link->id,
                'post_id' => $postId,
                'body' => $link->body,
                'title' => $post->title,

                'body_err' => ''
            ];
        }

        $this->view('mentors/opt_enrolment_list/v_edit_link', $data);
    }

    public function sendlink(){
        $postId = $_SESSION['current_viewing_post_id'];
        $post = $this->enrolmentListModel->getPostById($postId);
        $link = $this->enrolmentListModel->getSessionLink($postId);
        switch($_SESSION['specialized_actor_type']) {
            case 'Professional Guider' :
                $enrollments = $this->enrolmentListModel->getEnrollmentsForAPostG($postId);
                break;
            
            case 'Teacher' :
                $enrollments = $this->enrolmentListModel->getEnrollmentsForAPostT($postId);
                break;

            default:
                // nothing
                break;
        }

        $userData = [
            'email' => $enrollments->email
        ];

        $data = [
            'link' => $link->body,
            'title' => $post->title
        ];

        sendMentorSessionLink($userData['email'] , $data);
        flash('settings_message', 'Link sent');
        redirect('C_M_Enrolment_List/enrolStudentList'.$_SESSION['current_viewing_post_id']);
    }
}



?>