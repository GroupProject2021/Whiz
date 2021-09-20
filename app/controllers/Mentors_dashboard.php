<?php
    class Mentors_dashboard extends Controller{
        public function __construct() {
            $this->mentorDashboardModel = $this->model('Mentor_dashboard');
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
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
            $posts = $this->postModel->getPosts();

            $data = [
                'posts' => $posts
            ];

            $this->view('posts/index', $data);
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
                    if($this->postModel->addPost($data)) {
                        flash('post_message', 'Post added');
                        redirect('posts');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('posts/add', $data);
                }
            }
            else {
                $data = [
                    'id' => '',
                    'title' => '',
                    'body' => ''
                ];
            }

            $this->view('posts/add', $data);
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
                    if($this->postModel->updatePost($data)) {
                        flash('post_message', 'Post updated');
                        redirect('posts');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('posts/edit', $data);
                }
            }
            else {
                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body,                    
                    'title_err' => '',
                    'body_err' => ''
                ];
            }

            $this->view('posts/edit', $data);
        }

        public function show($id) {
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/show', $data);
        }

        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }
                
                if($this->postModel->deletePost($id)) {
                    flash('post_message', 'Post Removed');
                    redirect('posts');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                redirect('posts');
            }
        }

        
    }

?>