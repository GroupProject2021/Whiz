<?php
    class Posts_C_M_Banners extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post_Banners');
            $this->postUpvoteDownvoteModel = $this->model('Post_UpvoteDownvote');

            $this->commentModel = $this->model('Comment');            
            $this->reviewModel = $this->model('Review');

            $this->commonModel = $this->model('Common');
            $this->sessionLinkModel = $this->model('M_M_Enrolment_List');
        }        

        // Load banners
        public function index() {
            // Get posts
            // $posts = $this->postModel->getPosts();
            // $postsReviewssAndRates = $this->reviewModel->getPostsReviewsAndRates();

            // $data = [
            //     'posts' => $posts,
            //     'reviews_rates' => $postsReviewssAndRates
            // ];

            // $this->view('mentors/professional_guider/banners/index', $data);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $posts_filter = trim($_POST['filter']);
                $posts_filter_order = trim($_POST['filter-order']);

                $posts_search = trim($_POST['post-search']);
                $link = $this->sessionLinkModel->getSessionLinkwithoutId();

                    
                // filtering
                if(empty($posts_search)) {
                    $posts = $this->postModel->filterAndGetPostsToBanners($posts_filter, $posts_filter_order);
                }
                else {
                    // Search bar applied
                    $posts = $this->postModel->searchAndGetPostsToBanners($posts_search);
                }
    
    
                $data = [
                    'posts_filter' => $posts_filter,
                    'posts_filter_order' => $posts_filter_order,

                    'post_search' => $posts_search,
    
                    'posts' => $posts,
                    'link' => $link
                ];
                
                $this->view('mentors/professional_guider/banners/index', $data);
            }
            else {
                $posts_filter = 'all';
                $posts_filter_order = 'desc';

                $posts_search = '';
    
                // courses & intake notices
                
                // filtering
                $posts = $this->postModel->filterAndGetPostsToBanners($posts_filter, $posts_filter_order);
                $link = $this->sessionLinkModel->getSessionLinkwithoutId();

    
    
                $data = [    
                    'posts_filter' => $posts_filter,
                    'posts_filter_order' => $posts_filter_order,

                    'post_search' => $posts_search,
    
                    'posts' => $posts,
                    'link' => $link
                ];
                
                $this->view('mentors/professional_guider/banners/index', $data);
            }
        }

        // Add banner
        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'type' => 'banner',
                    'image' => $_FILES['image'],
                    'image_name' => time().'_'.$_FILES['image']['name'],
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'applied' => 0,
                    'capacity' => $_POST['capacity'],
                    'session_fee' => $_POST['session_fee'],
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => '',
                    'session_fee_err' => '',
                    
                    'ups' => 0,
                    'downs' => 0,
                    'shares' => 0,
                    'views' => 0
                ];

                // validate and upload profile image
                if($data['image']['size'] > 0) {
                    if(uploadImage($data['image']['tmp_name'], $data['image_name'], '/imgs/posts/banners/')) {
                        // flash('profile_image_upload', 'Profile picture uploaded successfully');
                    }
                    else {
                        // upload unsuccessfull                        
                        die('uns');
                    }
                }
                else {
                    // set image name as null - because image not exits - then default time stamp will be removed
                    $data['image_name'] = null;
                }

                // Validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                // Validate body
                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter title';
                }

                // Validate session fee
                if(empty($data['session_fee'])) {
                    $data['session_fee_err'] = 'Please enter session fee';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {

                    // Validated
                    if($this->postModel->addPost($data, 'banner')) {
                        // flash('post_message', 'Post added');
                        // redirect('Posts_C_M_Banners');
                        
                        $_SESSION['post_to_be_payed'] = $this->postModel->getPostIdByImageTitleAndBody($data);
                        redirect('Payments/payment');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('mentors/professional_guider/banners/add', $data);
                }
            }
            else {
                $data = [
                    'type' => '',
                    'image' => '',
                    'image_name' => '',
                    'id' => '',
                    'title' => '',
                    'body' => '',
                    'applied' => '',
                    'capacity' => '',
                    'session_fee' => '',
                    'ups' => '',
                    'downs' => '',
                    'shares' => '',
                    'views' => '',

                    'session_fee_err' => ''
                ];
            }

            $this->view('mentors/professional_guider/banners/add', $data);
        }
        

        // Edit banner
        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'image' => $_FILES['image'],
                    'image_name' => time().'_'.$_FILES['image']['name'],
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'capacity' => $_POST['capacity'],
                    'session_fee' => $_POST['session_fee'],
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => '',
                    'session_fee_err' => '',
                    'isImageRemoved' => $_POST['isImageRemoved']

                ];

                // validate and upload profile image
                $post = $this->postModel->getPostById($id);
                $oldImage = PUBROOT.'/imgs/posts/banners/'.$post->image;

                // photo intentionally removed
                if($data['isImageRemoved'] == 'removed') {
                    updateImage($oldImage, $data['image']['tmp_name'], $data['image_name'], '/imgs/posts/banners/');
                    $data['image_name'] = NULL;
                }
                else {
                    if($_FILES['image']['name'] == '') {
                        // not removed so keep the old
                        $data['image_name'] = $post->image;
                    }
                    else {
                        // updated for a new photo
                        updateImage($oldImage, $data['image']['tmp_name'], $data['image_name'], '/imgs/posts/banners/');
                    }
                }

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
                        if($_SESSION['actor_type'] != "Admin") {
                            redirect('/Posts_C_M_Banners/show/'.$id);
                        }
                        else {
                            redirect('/C_S_Stu_To_ProfessionalGuider/show/'.$id);
                        }
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('mentors/professional_guider/banners/edit', $data);
                }
            }
            else {
                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for owner
                if($post->userId != $_SESSION['user_id']) {
                    if($_SESSION['actor_type'] != "Admin") {
                        redirect('Posts_C_M_Banners');
                    }
                }

                $data = [
                    'image' => '',
                    'image_name' => $post->image,
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body,   
                    'capacity' => $post->capacity,
                    'session_fee' => $post->session_fee,                              
                    'title_err' => '',
                    'body_err' => '',
                    'session_fee_err' => ''
                ];
            }

            $this->view('mentors/professional_guider/banners/edit', $data);
        }

        // View banner
        public function show($id) {
            // if post not exist
            if(!($this->postModel->isPostExist($id))) {
                $this->index();
                return;
            }

            $_SESSION['current_viewing_post_id'] = $id;
            $_SESSION['currect_viewing_post_type'] = "Banner";

            $post = $this->postModel->getPostById($id);
            $user = $this->commonModel->getUserById($post->userId);

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


            $totalReviews = $this->reviewModel->getTotalReviewsForAPostById($id);

            $rateHaving1 = $this->reviewModel->getRateAmountsForAPostById($id, 1);
            $rateHaving2 = $this->reviewModel->getRateAmountsForAPostById($id, 2);
            $rateHaving3 = $this->reviewModel->getRateAmountsForAPostById($id, 3);
            $rateHaving4 = $this->reviewModel->getRateAmountsForAPostById($id, 4);
            $rateHaving5 = $this->reviewModel->getRateAmountsForAPostById($id, 5);

            if($totalReviews) {
                $rate1Precentage = ($rateHaving1/$totalReviews) * 100;
                $rate2Precentage = ($rateHaving2/$totalReviews) * 100;
                $rate3Precentage = ($rateHaving3/$totalReviews) * 100;
                $rate4Precentage = ($rateHaving4/$totalReviews) * 100;
                $rate5Precentage = ($rateHaving5/$totalReviews) * 100;

                $avgRate = ((1*$rateHaving1) + (2*$rateHaving2) + (3*$rateHaving3) + (4*$rateHaving4) + (5*$rateHaving5)) / $totalReviews;
            }
            else {
                $rate1Precentage = 0;
                $rate2Precentage = 0;
                $rate3Precentage = 0;
                $rate4Precentage = 0;
                $rate5Precentage = 0;

                $avgRate = 0;
            }
            
            $avgRate = number_format((float)$avgRate, 1, '.', '');

            $data = [
                'post' => $post,
                'user' => $user,

                'ups' => $ups,
                'downs' => $downs,
                'self_interaction' => $selfInteraction,

                'total_reviews' => $totalReviews,
                'rate1' => $rate1Precentage,
                'rate2' => $rate2Precentage,
                'rate3' => $rate3Precentage,
                'rate4' => $rate4Precentage,
                'rate5' => $rate5Precentage,
                'avg_rate' => $avgRate
            ];

            $this->view('mentors/professional_guider/banners/show', $data);

            
        }

        // Delte banner
        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for owner
                if($post->userId != $_SESSION['user_id']) {
                    redirect('Posts_C_M_Banners');
                }

                // $res1 = $this->commentModel->deleteComment($id);
                // $res2 = $this->reviewModel->deleteReview($id);
                // $res3 = $this->postUpvoteDownvoteModel->deleteInteraction($id);

                // validate and delete image
                if(!empty($post->image)){
                    $postImage = PUBROOT.'/imgs/posts/banners/'.$post->image;
                    $res5 = deleteImage($postImage);
                }
                else {
                    $res5 = true;
                }

                $res4 = $this->postModel->deletePost($id);                

                // session link
                $link = $this->sessionLinkModel->deleteLink($id);
                
                if($res4 && $res5 && $link) {
                    flash('post_message', 'Post Removed');
                    redirect('Posts_C_M_Banners');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                redirect('Posts_C_M_Banners');
            }
        }

        // payment gateway return
        public function updateBannerAsPayed() {
            $res = $this->postModel->updateBannerAsPayed($_SESSION['post_to_be_payed']);

            if($res) {
                redirect('Posts_C_M_Banners/index');
            }
            else {
                $this->delete($_SESSION['post_to_be_payed']);
            }

            unset($_SESSION['post_to_be_payed']);
        }

        public function postPayingForBanner($id) {
            $_SESSION['post_to_be_payed'] = $id;
            redirect('Payments/payment');
        }

        // LIKES DISLIKES REMOVED
    }
?>