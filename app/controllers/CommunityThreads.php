<?php
    class CommunityThreads extends Controller {
        public function __construct() {
            $this->communityModel = $this->model('CommunityThread');
            $this->communityCommentModel = $this->model('CommunityThreadComment');
        }

        // Index
        public function index() {
            // Get posts
            $threads = $this->communityModel->getThreads();

            $data = [
                'threads' => $threads
            ];

            $this->view('common/community_thread', $data);
        }
        
        // my threads
        public function myThreads($id) {
            // Get posts
            $threads = $this->communityModel->getUserThreads($id);

            $data = [
                'threads' => $threads
            ];

            $this->view('common/community_thread_myThreads', $data);
        }

        // add
        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => '',
                    
                    'views' => 0
                ];

                // Validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                // Validate body
                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter body';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    // Validated
                    if($this->communityModel->addThread($data)) {
                        flash('thread_msg', 'Thread added');
                        redirect('CommunityThreads/index');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('common/community_thread_add', $data);
                }
            }
            else {
                $data = [
                    'title' => '',
                    'body' => '',
                    'user_id' => '',
                    'title_err' => '',
                    'body_err' => '',
                    
                    'views' => 0
                ];
            }

            $this->view('common/community_thread_add', $data);
        }

        // Edit
        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'thread_id' => $id,
                    'title_err' => '',
                    'body_err' => '',
                    
                    'views' => 0
                ];

                // Validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                // Validate body
                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter body';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    // Validated
                    if($this->communityModel->updateThread($data)) {
                        flash('thread_msg', 'Thread updated');
                        redirect('CommunityThreads/index');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('common/community_thread_edit', $data);
                }
            }
            else {
                // Get existing thread from model
                $thread = $this->communityModel->getThreadById($id);

                // Check for owner
                if($thread->user_id != $_SESSION['user_id']) {
                    redirect('CommunityThreads/index');
                }

                $data = [
                    'title' => $thread ->title,
                    'body' => $thread->body,
                    'user_id' => $thread ->user_id,
                    'thread_id' => $thread->thread_id,
                    'title_err' => '',
                    'body_err' => '',
                    
                    'views' => $thread->views
                ];
            }

            $this->view('common/community_thread_edit', $data);
        }

        // View
        public function show($id) {
            // increment views
            $this->communityModel->incViews($id);

            // Get existing thread from model
            $thread = $this->communityModel->getThreadById($id);

            $data = [
                'thread' => $thread
            ];

            $this->view('common/community_thread_show', $data);
        }

        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $thread = $this->communityModel->getThreadById($id);

                // Check for owner
                if($thread->user_id != $_SESSION['user_id']) {
                    redirect('CommunityThreads/index');
                }

                $res1 = $this->communityCommentModel->deleteComment($id);
                $res2 = $this->communityModel->deleteThread($id);
                
                if($res1 && $res2) {
                    flash('thread_msg', 'Thread Removed');
                    redirect('CommunityThreads/index');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                redirect('CommunityThreads/index');
            }
        }
    }
?>