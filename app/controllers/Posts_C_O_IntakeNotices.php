<?php
    class Posts_C_O_IntakeNotices extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post_IntakeNotices');
            $this->postUpvoteDownvoteModel = $this->model('Post_UpvoteDownvote');
            $this->commentModel = $this->model('Comment');     

            $this->commonModel = $this->model('Common');            
        }        

        // Load notice posts
        public function index() {
            // Get posts
            // $posts = $this->postModel->getPosts($_SESSION['user_id']);

            // $data = [
            //     'posts' => $posts
            // ];

            // $this->view('organization/university/noticePosts/index', $data);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $posts_filter = trim($_POST['filter']);
                $posts_filter_order = trim($_POST['filter-order']);

                $posts_search = trim($_POST['post-search']);
                
                // filtering
                if(empty($posts_search)) {
                    $posts = $this->postModel->filterAndGetPostsToIntakeNotices($posts_filter, $posts_filter_order);
                }
                else {
                    // Search bar applied
                    $posts = $this->postModel->searchAndGetPostsToIntakeNotices($posts_search);
                }
    
    
                $data = [
                    'posts_filter' => $posts_filter,
                    'posts_filter_order' => $posts_filter_order,

                    'post_search' => $posts_search,
    
                    'posts' => $posts
                ];
                
                $this->view('organization/university/noticePosts/index', $data);
            }
            else {
                $posts_filter = 'all';
                $posts_filter_order = 'desc';

                $posts_search = '';

                // filtering
                $posts = $this->postModel->filterAndGetPostsToIntakeNotices($posts_filter, $posts_filter_order);
    
    
                $data = [
                    'posts_filter' => $posts_filter,
                    'posts_filter_order' => $posts_filter_order,

                    'post_search' => $posts_search,
    
                    'posts' => $posts
                ];
                
                $this->view('organization/university/noticePosts/index', $data);
            }
        }

        // Add notice posts
        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'type' => 'noticepost',
                    'image' => $_FILES['image'],
                    'image_name' => time().'_'.$_FILES['image']['name'],
                    'notice_name' => trim($_POST['notice_name']),
                    'notice_content' => trim($_POST['notice_content']),
                    'private_uni_id' => $_SESSION['user_id'],
                    
                    'image_err' => '',
                    'notice_name_err' => '',
                    'notice_content_err' => '',
                    
                    'ups' => 0,
                    'downs' => 0,
                    'shares' => 0,
                    'views' => 0
                ];

                // validate and upload profile image
                if($data['image']['size'] > 0) {
                    if(uploadImage($data['image']['tmp_name'], $data['image_name'], '/imgs/posts/notices/')) {
                        flash('image_upload', 'Profile picture uploaded successfully');
                    }
                    else {
                        // upload unsuccessfull
                        $data['image_err'] = 'Profile picture uploading unsuccessful';
                    }
                }
                else {
                    // set image name as null - because image not exits - then default time stamp will be removed
                    $data['image_name'] = null;
                }

                // Validate notice name
                if(empty($data['notice_name'])) {
                    $data['notice_name_err'] = 'Please enter notice name';
                }

                // Validate content
                if(empty($data['notice_content'])) {
                    $data['notice_content_err'] = 'Please enter notice content';
                }

                
                // Make sure no errors
                if(empty($data['image_err']) && empty($data['notice_name_err']) && empty($data['notice_content_err'])) {
                    // Validated
                    if($this->postModel->addPost($data)) {
                        // flash('post_message', 'Notice added');
                        // redirect('Posts_C_O_IntakeNotices/index');

                        
                        $_SESSION['post_to_be_payed'] = $this->postModel->getPostIdByImageTitleAndBody($data);
                        redirect('Payments/payment');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('organization/university/noticePosts/add', $data);
                }
            }
            else {
                $data = [
                    'type' => '',
                    'image' => '',
                    'image_name' => '',
                    'notice_name' => '',
                    'notice_content' => '',
                    'private_uni_id' => '',
                    
                    'image_err' => '',
                    'notice_name_err' => '',
                    'notice_content_err' => '',
                    
                    'ups' => 0,
                    'downs' => 0,
                    'shares' => 0,
                    'views' => 0
            
                ];
            }

            $this->view('organization/university/noticePosts/add', $data);
        }

        // Edit notice posts
        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'image' => $_FILES['image'],
                    'image_name' => time().'_'.$_FILES['image']['name'],
                    'postid' => $id,
                    'notice_name' => trim($_POST['notice_name']),
                    'notice_content' => trim($_POST['notice_content']),
                    'private_uni_id' => $_SESSION['user_id'],
                    
                    'image_err' => '',
                    'notice_name_err' => '',
                    'notice_content_err' => '',
                    'isImageRemoved' => $_POST['isImageRemoved']
                ];

                // validate and upload profile image
                $post = $this->postModel->getPostById($id);
                $oldImage = PUBROOT.'/imgs/POSTS/'.$post->image;

                // photo intentionally removed
                if($data['isImageRemoved'] == 'removed') {
                    updateImage($oldImage, $data['image']['tmp_name'], $data['image_name'], '/imgs/posts/notices/');
                    $data['image_name'] = NULL;
                }
                else {
                    if($_FILES['image']['name'] == '') {
                        // not removed so keep the old
                        $data['image_name'] = $post->image;
                    }
                    else {
                        // updated for a new photo
                        updateImage($oldImage, $data['image']['tmp_name'], $data['image_name'], '/imgs/posts/notices/');

                        // validate and upload profile image
                        if($data['image']['size'] > 0) {
                            if(uploadImage($data['image']['tmp_name'], $data['image_name'], '/imgs/posts/notices/')) {
                                flash('image_upload', 'Profile picture uploaded successfully');
                            }
                            else {
                                // upload unsuccessfull
                                $data['image_err'] = 'Profile picture uploading unsuccessful';
                            }
                        }
                    }
                }

                // Validate notice name
                if(empty($data['notice_name'])) {
                    $data['notice_name_err'] = 'Please enter notice name';
                }

                // Validate content
                if(empty($data['notice_content'])) {
                    $data['notice_content_err'] = 'Please enter notice content';
                }

                
                // Make sure no errors
                if(empty($data['image_err']) && empty($data['notice_name_err']) && empty($data['notice_content_err'])) {
                    // Validated
                    if($this->postModel->updatePost($data)) {
                        flash('post_message', 'Post updated');
                        if($_SESSION['actor_type'] != "Admin") {
                            redirect('/Posts_C_O_IntakeNotices/show/'.$id);
                        }
                        else {
                            redirect('/Posts_C_O_IntakeNotices/show/'.$id);
                        }
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('organization/university/noticePosts/edit', $data);
                    }
                }

            else {
                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for owner
                if($post->private_uni_id != $_SESSION['user_id']) {
                    if($_SESSION['actor_type'] != "Admin") {
                        redirect('Posts_C_O_IntakeNotices/index');
                    }
                }

                $data = [
                    'image' => '',
                    'image_name' =>  $post->image,
                    'postid' => $id,
                    'notice_name' => $post->noticeName,
                    'notice_content' => $post->noticeContent, 
                    'private_uni_id' => $_SESSION['user_id'],
                        
                    'image_err' => '',
                    'notice_name_err' => '',
                    'notice_content_err' => '',
                ];
            }
    
            $this->view('organization/university/noticePosts/edit', $data);
        }

        // Show notice posts
        public function show($id) {
            // if post not exist
            if(!($this->postModel->isPostExist($id))) {
                $this->index();
                return;
            }

            $_SESSION['current_viewing_post_id'] = $id;
            $_SESSION['currect_viewing_post_type'] = "Notice Post";

            $post = $this->postModel->getPostById($id);
            $user = $this->commonModel->getUserById($post->private_uni_id);

            $ups = $this->postUpvoteDownvoteModel->getInc($id)->ups;
            $downs = $this->postUpvoteDownvoteModel->getDown($id)->downs;
            $userId = $_SESSION['user_id'];

            if($this->postUpvoteDownvoteModel->isPostInterationExist($userId, $id)) {
                $selfInteraction = $this->postUpvoteDownvoteModel->getPostInteration($userId, $id);
                $selfInteraction = $selfInteraction->interaction;
            }
            else {
                $selfInteraction = '';
            }


            $data = [
                'post' => $post,
                'user' => $user,

                'ups' => $ups,
                'downs' => $downs,
                'self_interaction' => $selfInteraction
            ];

            $this->view('organization/university/noticePosts/show', $data);

            
        }

        // Delete notice posts
        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for owner
                if($post->private_uni_id != $_SESSION['user_id']) {
                    redirect('Posts_C_O_IntakeNotices/index');
                }

                // $res1 = $this->commentModel->deleteComment($id);
                // $res2 = $this->reviewModel->deleteReview($id);
                // $res3 = $this->postModel->deleteInteraction($id);
                $res4 = $this->postModel->deletePost($id);

                // validate and upload profile image
                $postImage = PUBROOT.'/imgs/posts/notices/'.$post->image;
                $res5 = deleteImage($postImage);
                
                if($res4 && $res5) {
                    flash('post_message', 'Post Removed');
                    redirect('Posts_C_O_IntakeNotices/index');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                redirect('Posts_C_O_IntakeNotices/show/$id');
            }
        }


        // payment gateway return
        public function updateIntakeNoticeAsPayed() {
            $res = $this->postModel->updateIntakeNoticeAsPayed($_SESSION['post_to_be_payed']);

            if($res) {
                redirect('Posts_C_O_IntakeNotices/index');
            }
            else {
                $this->delete($_SESSION['post_to_be_payed']);
            }

            unset($_SESSION['post_to_be_payed']);
        }

        public function postPayingForIntakeNotice($id) {
            $_SESSION['post_to_be_payed'] = $id;
            redirect('Payments/payment');
        }
        // LIKES DISLIKES REMOVED
    }
?>