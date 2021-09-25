<?php


    class Posts extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');

            
        }

        

        public function index() {
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
                    'body_err' => '',
                    
                    'ups' => 0,
                    'downs' => 0,
                    'shares' => 0,
                    'views' => 0
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
                    'body' => '',
                    'ups' => '',
                    'downs' => '',
                    'shares' => '',
                    'views' => ''
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
            $_SESSION['current_viewing_post_id'] = $id;

            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $ups = $this->postModel->getInc($id)->ups;
            $downs = $this->postModel->getDown($id)->downs;

            $data = [
                'post' => $post,
                'user' => $user,

                'ups' => $ups,
                'downs' => $downs
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


        public function incUp($id) {
            $ups = $this->postModel->incUp($id);
            if($ups != false) {
                echo $ups->ups;
            }    
        }

        public function incDown($id) {
            $downs = $this->postModel->incDown($id);
            if($downs != false) {
                echo $downs->downs;
            }    
        }

        public function comment($id) {
            $userId = $_SESSION['user_id'];
            $postId = $id;
            $commentContent = $_POST['post-comment'];


            echo 'user: '.$userId.' post: '.$postId.' comment: '.$commentContent;

            $data = [
                'post_id' => $postId,
                'user_id' => $userId,
                'content' => $commentContent
            ];

            if($this->postModel->addComment($data)) {
                echo 'success';
            }
            else {
                echo 'failed';
            }
        }

        

        public function showComments($id) {
            $comments = $this->postModel->getComments($id);

            // RENDER COMMENTS
            foreach($comments as $comment) {
                $user = $this->postModel->getUserDetails($comment->user_id);

                

                echo '<div class="comment">';
                echo '<div class="comment-header">';
                echo    '<div class="comment-header-icon"><img src="'.URLROOT.'/profileimages/student/'.$user->profile_image.'" alt=""></div>';
                echo    '<div class="comment-header-actortypeicon"><img src="'.URLROOT.'/imgs/prof.jpg" alt=""></div>';
                echo    '<div class="comment-header-postedby">'.$user->name.'</div>';
                if($user->status == "verified") {
                    echo    '<div class="comment-header-verified"><img src="'.URLROOT.'/imgs/verified.png" alt=""></div>';
                }
                echo    '<div class="comment-header-postedtime">'.convertedToReadableTimeFormat($comment->created_at).'</div>';
                echo '</div>';
                echo '<div class="comment-body">';
                echo    $comment->content;
                echo '</div>';
                echo '<div class="comment-footer">';
                echo '<button>';
                echo    '<div class="comment-footer-likebtn"><img src="'.URLROOT.'/imgs/up-icon.png" alt=""></div>';
                echo    '<div class="comment-footer-text">likes</div>';
                echo '</button>';
                echo '<button>';
                echo    '<div class="comment-footer-dislikebtn"><img src="'.URLROOT.'/imgs/down-icon.png" alt=""></div>';
                echo    '<div class="comment-footer-text">dislikes</div>';
                echo '</button>';
                echo '<button>';
                echo    '<div class="comment-footer-replybtn"><img src="'.URLROOT.'/imgs/reply-icon.png" alt=""></div>';
                echo    '<div class="comment-footer-text">reply</div>';
                echo '</button>';
                echo '</div>';
                echo '</div>';
            }
        }

        public function incShare() {

        }

        public function incView() {

        }
    }
?>