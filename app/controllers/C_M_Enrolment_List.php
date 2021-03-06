<?php

class C_M_Enrolment_List extends Controller{

    public function __construct() {
        $this->enrolmentListModel = $this->model('M_M_Enrolment_List');
        // $this->mentorDashboardModel = $this->model('Post');
        $this->proGuiderModel = $this->model('Post_Banners');
        $this->teacherModel = $this->model('Post_Posters');
        $this->notificationModel = $this->model('Notification');
        
    }

    // Index
    public function index() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Mentor'], ['Professional Guider', 'Teacher']);

        switch($_SESSION['specialized_actor_type']) {
            case 'Professional Guider' :
                $post = $this->proGuiderModel->getPosts();
                break;
            
            case 'Teacher' :
                $post = $this->teacherModel->getPosts();
                break;

            default:
                // nothing
                break;
        }
        
        // $postt = $this->enrolmentListModel
        $link = $this->enrolmentListModel->getSessionLinkwithoutId();

        $data = [
            'posts' => $post,
            'link' => $link,
            
        ];

        $this->view('mentors/opt_enrolment_list/v_enrolment_list', $data);
    }

    // Enroll list
    public function enrolStudentList($post_id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Mentor'], ['Professional Guider', 'Teacher']);

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
            'title' => $sessionTitle->title,
            'applied' => $sessionTitle->applied
        ];

        $this->view('mentors/opt_enrolment_list/v_enrol_student_list', $data);
    }

    // upload link
    public function addlink() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Mentor'], ['Professional Guider', 'Teacher']);

        $postId = $_SESSION['current_viewing_post_id'];
        $post = $this->proGuiderModel->getPostById($postId);
        $sessionTitle = $this->enrolmentListModel->getPostById($postId);

        // to notifications
        switch($_SESSION['specialized_actor_type']) {
            case 'Professional Guider' :
                $studentList = $this->enrolmentListModel->getEnrollmentsForAPostG($postId);
                break;
            
            case 'Teacher' :
                $studentList = $this->enrolmentListModel->getEnrollmentsForAPostT($postId);
                break;

            default:
                // nothing
                break;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                
                'post_id' => $postId,
                'date' => trim($_POST['date']),
                'time' => trim($_POST['time']),
                'body' => trim($_POST['body']),

                'date_err' => '',
                'time_err' => '',
                'body_err' => '',

                'title' => $sessionTitle->title,
                
                
                
            ];

            // Validate content
            if(empty($data['date'])) {
                $data['date_err'] = 'Please enter date';
            }else if(date("Y-m-d") > $data['date']){
                $data['date_err'] = 'Please enter a valid date';
            }

            if(empty($data['time'])) {
                $data['time_err'] = 'Please enter time';
            }

            if(empty($data['body'])) {
                $data['body_err'] = 'Please enter link';
            }

            // Make sure no errors
            if(empty($data['date_err']) && empty($data['time_err']) && empty($data['body_err'])) {
                // Validated
                if($this->enrolmentListModel->addLink($data)) { // model needs to update
                    flash('post_message', 'Link Uploaded');

                    // SEND NOTIFICATIONS
                    foreach($studentList as $student) {
                        $senderId = $_SESSION['user_id'];
                        $receiverID = $student->user_id;
                        $notification = 'Add a session link';
                        $this->notificationModel->sendNotification($senderId, $receiverID, $notification);
                    }

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
                'date' => '',
                'time' => '',
                'post' => $post,
                'title' => $sessionTitle->title,

                'date_err' => '',
                'time_err' => ''
            ];
        }

        $this->view('mentors/opt_enrolment_list/v_add_link', $data);
    }

    public function viewlink () {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Mentor'], ['Professional Guider', 'Teacher']);

        $postId = $_SESSION['current_viewing_post_id'];
        // $post = $this->mentorDashboardModel->getPostById($postId);
        $sessionData = $this->enrolmentListModel->getSessionLink($postId);
        $sessionTitle = $this->enrolmentListModel->getPostById($postId);
        
        $data = [
            'date' => $sessionData->date,
            'time' => $sessionData->time,
            'link' => $sessionData->body,
            'title' => $sessionTitle->title
        ];

        $this->view('mentors/opt_enrolment_list/v_view_link', $data);
    }

    public function editlink() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Mentor'], ['Professional Guider', 'Teacher']);

        $postId = $_SESSION['current_viewing_post_id'];
        $post = $this->enrolmentListModel->getPostById($postId);
        $link = $this->enrolmentListModel->getSessionLink($postId);

        // to notifications
        switch($_SESSION['specialized_actor_type']) {
            case 'Professional Guider' :
                $studentList = $this->enrolmentListModel->getEnrollmentsForAPostG($postId);
                break;
            
            case 'Teacher' :
                $studentList = $this->enrolmentListModel->getEnrollmentsForAPostT($postId);
                break;

            default:
                // nothing
                break;
        }


        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id'=> $link->id,
                'post_id' => $postId,
                'date' => trim($_POST['date']),
                'time' => trim($_POST['time']),
                'body' => trim($_POST['link']),
                'title' => $post->title,

                'date_err' => '',
                'time_err' => '',
                'body_err' => ''
            ];

            // validate link
            if(empty($data['date'])) {
                $data['date_err'] = 'Please enter date';
            }else if(date("Y-m-d") > $data['date']){
                $data['date_err'] = 'Please enter a valid date';
            }

            if(empty($data['time'])) {
                $data['time_err'] = 'Please enter time';
            }

            if(empty($data['body'])) {
                $data['body_err'] = 'Please enter link';
            }

            // Make sure no errors
            if(empty($data['date_err']) && empty($data['time_err']) && empty($data['body_err'])) {
                // Validated                    
                // $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);
                if($this->enrolmentListModel->updateLink($data)) {
                    flash('settings_message', 'Link updated');
                    
                    // SEND NOTIFICATIONS
                    foreach($studentList as $student) {
                        $senderId = $_SESSION['user_id'];
                        $receiverID = $student->user_id;
                        $notification = 'published a new session link';
                        $this->notificationModel->sendNotification($senderId, $receiverID, $notification);
                    }
                    
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
                'date' => $link->date,
                'time' => $link->time,
                'body' => $link->body,
                'title' => $post->title,

                'date_err' => '',
                'time_err' => '',
                'body_err' => ''
            ];
        }

        $this->view('mentors/opt_enrolment_list/v_edit_link', $data);
    }

    public function sendlink(){
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Mentor'], ['Professional Guider', 'Teacher']);
        
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

        // $userData = [
        //     'email' => $enrollments->email
        // ];

        $data = [
            'link' => $link->body,
            'title' => $post->title
        ];

        foreach ($enrollments as $enrollments) {
            sendMentorSessionLink($enrollments->email , $data);
        }

        // sendMentorSessionLink($userData['email'] , $data);
        // flash('settings_message', 'Link sent');
        // redirect('C_M_Enrolment_List/enrolStudentList'.$_SESSION['current_viewing_post_id']);
    }
}



?>