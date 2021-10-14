<?php
    class Posts_C_M_Banners extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post');
            $this->commentModel = $this->model('Comment');            
            $this->reviewModel = $this->model('Review');

            $this->commonModel = $this->model('Common');            
        }        

        public function index() {
            // Get posts
            $posts = $this->postModel->getPosts();
            $postsReviewssAndRates = $this->reviewModel->getPostsReviewsAndRates();

            $data = [
                'posts' => $posts,
                'reviews_rates' => $postsReviewssAndRates
            ];

            $this->view('mentors/professional_guider/banners/index', $data);
        }


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
                    'capacity' => 0,
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => '',
                    
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
                        // $data['profile_image_err'] = 'Profile picture uploading unsuccessful';                        print_r($data['image']['size']);
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

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    // Validated
                    if($this->postModel->addPost($data)) {
                        flash('post_message', 'Post added');
                        redirect('Posts_C_M_Banners');
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
                    'ups' => '',
                    'downs' => '',
                    'shares' => '',
                    'views' => ''
                ];
            }

            $this->view('mentors/professional_guider/banners/add', $data);
        }

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
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
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
                        redirect('Posts_C_M_Banners');
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
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('Posts_C_M_Banners');
                }

                $data = [
                    'image' => '',
                    'image_name' => $post->image,
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body,                    
                    'title_err' => '',
                    'body_err' => ''
                ];
            }

            $this->view('mentors/professional_guider/banners/edit', $data);
        }

        public function show($id) {
            // if post not exist
            if(!($this->postModel->isPostExist($id))) {
                $this->index();
                return;
            }

            $_SESSION['current_viewing_post_id'] = $id;

            $post = $this->postModel->getPostById($id);
            $user = $this->commonModel->getUserById($post->user_id);

            $ups = $this->postModel->getInc($id)->ups;
            $downs = $this->postModel->getDown($id)->downs;
            $userId = $_SESSION['user_id'];

            if($this->postModel->isPostInterationExist($userId, $id)) {
                $selfInteraction = $this->postModel->getPostInteration($userId, $id);
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

        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('Posts_C_M_Banners');
                }

                $res1 = $this->commentModel->deleteComment($id);
                $res2 = $this->reviewModel->deleteReview($id);
                $res3 = $this->postModel->deleteInteraction($id);
                $res4 = $this->postModel->deletePost($id);

                // validate and upload profile image
                $postImage = PUBROOT.'/imgs/posts/banners/'.$post->image;
                $res5 = deleteImage($postImage);
                
                if($res1 && $res2 && $res3 && $res4 && $res5) {
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


        // For likes
        public function incUp($id) {
            $ups = $this->postModel->incUp($id);

            $userId = $_SESSION['user_id'];

            if($this->postModel->isPostInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->postModel->setPostInteraction($userId, $id, 'liked');
            }
            else {
                // If no previous interaction exists
                $res = $this->postModel->addPostInteraction($userId, $id, 'liked');
            }

            if($ups != false && $res != false) {
                echo $ups->ups;
            }
        }

        public function decUp($id) {
            $ups = $this->postModel->decUp($id);

            $userId = $_SESSION['user_id'];
            $res = $this->postModel->setPostInteraction($userId, $id, 'like removed');

            if($ups != false && $res != false) {
                echo $ups->ups;
            }    
        }

        // For dislikes
        public function incDown($id) {
            $downs = $this->postModel->incDown($id);

            $userId = $_SESSION['user_id'];

            if($this->postModel->isPostInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->postModel->setPostInteraction($userId, $id, 'disliked');
            }
            else {
                // If no previous interaction exists
                $res = $this->postModel->addPostInteraction($userId, $id, 'disliked');
            }

            if($downs != false && $res != false) {
                echo $downs->downs;
            }    
        }

        public function decDown($id) {
            $downs = $this->postModel->decDown($id);

            $userId = $_SESSION['user_id'];
            $res = $this->postModel->setPostInteraction($userId, $id, 'dislike removed');

            if($downs != false && $res != false) {
                echo $downs->downs;
            }    
        }

        

        public function incShare() {

        }

        public function incView() {

        }
    }
?>