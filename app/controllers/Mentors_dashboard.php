<?php
    class Mentors_dashboard extends Controller{
        public function __construct() {
            $this->mentorDashboardModel = $this->model('Mentor_dashboard');
            $this->commonModel = $this->model('Common');
        }

        public function index() {
            $posts = $this->mentorDashboardModel->getPosts();
            $data = ['title' => 'Welcome to Professional Guider dashboard', 'posts' => $posts];
            //$this->view('mentors/professional_guider/prof_guide_dashboard', $data);

            switch($_SESSION['specialized_actor_type']) {
                case 'Professional Guider' :
                    $this->view('mentors/professional_guider/prof_guide_dashboard', $data);
                    break;
                
                case 'Teacher' :
                    $this->view('mentors/teacher/teacher_dashboard', $data);
                    break;

                default:
                    // nothing
                    break;
            }
        }

        // post functions

        public function banner() {
            // Get posts
            $posts = $this->mentorDashboardModel->getPosters();

            $data = [
                'posts' => $posts
            ];

            $this->view('mentors/posts/index', $data);
        }

        public function poster() {
            // Get posts
            $posts = $this->mentorDashboardModel->getPosters();

            $data = [
                'posts' => $posts
            ];

            $this->view('mentors/posts/index', $data);
        }

        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                // Validate body
                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter title';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    // Validated
                    if($this->mentorDashboardModel->addPost($data)) {
                        flash('post_message', 'Post added');
                        redirect('mentors_dashboard/banner');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('mentors/posts/add', $data);
                }
            }
            else {
                $data = [
                    // 'id' => '',
                    'title' => '',
                    'body' => '',

                    'title_err' => '',
                    'body_err' => ''
                ];
            }

            $this->view('mentors/posts/add', $data);
        }

        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                // Validate body
                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter title';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    // Validated
                    if($this->mentorDashboardModel->updatePost($data)) {
                        flash('post_message', 'Post updated');
                        redirect('mentors_dashboard/banner');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('mentors/posts/edit', $data);
                }
            }
            else {
                // Get existing post from model
                $post = $this->mentorDashboardModel->getPostById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('mentors_dashboard/banner');
                }

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body,                    
                    'title_err' => '',
                    'body_err' => ''
                ];
            }

            $this->view('mentors/posts/edit', $data);
        }

        public function show($id) {
            $post = $this->mentorDashboardModel->getPostById($id);
            $user = $this->commonModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('mentors/posts/show', $data);
        }

        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $post = $this->mentorDashboardModel->getPostById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('mentors_dashboard/banner');
                }
                
                if($this->mentorDashboardModel->deletePost($id)) {
                    flash('post_message', 'Post Removed');
                    redirect('mentors_dashboard/banner');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                redirect('mentors_dashboard/banner');
            }
        }

        // Complaints
        public function complaint() {
            // Get posts
            $posts = $this->mentorDashboardModel->getComplaints();

            $data = [
                'posts' => $posts
            ];

            $this->view('mentors/opt_complaint/v_complaint_index', $data);
        }

        
    }

?>