<?php
    class Mentors_dashboard extends Controller{
        public function __construct() {
            $this->mentorDashboardModel = $this->model('Mentor_dashboard');
            $this->commonModel = $this->model('Common');
            $this->postModel = $this->model('Post');
            $this->sessionLinkModel = $this->model('M_M_Enrolment_List');
        }

        public function index() {

            $details = $this->mentorDashboardModel->dashboard($_SESSION['user_id']);
            
            $data = [
                'title' => 'Welcome to Professional Guider dashboard', 
                'details' => $details
                
            ];
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
            $posts = $this->mentorDashboardModel->getBanners();

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

        public function addBanner() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'image' => $_FILES['image'],
                    'image_name' => time().'_'.$_FILES['image']['name'],
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

                // validate and upload profile image
                if($data['image']['size'] > 0) {
                    if(uploadImage($data['image']['tmp_name'], $data['image_name'], '/imgs/POSTS/')) {
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
                    if($this->mentorDashboardModel->addBanner($data)) {
                                flash('post_message', 'Banner added');
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
                    'image' => '',
                    'image_name' => '',
                    'id' => '',
                    'title' => '',
                    'body' => '',
                    'ups' => '',
                    'downs' => '',
                    'shares' => '',
                    'views' => '',

                    'title_err' => '',
                    'body_err' => ''
                ];
            }

            $this->view('mentors/posts/add', $data);
        }

        public function addPoster() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'image' => $_FILES['image'],
                    'image_name' => time().'_'.$_FILES['image']['name'],
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

                // validate and upload profile image
                if($data['image']['size'] > 0) {
                    if(uploadImage($data['image']['tmp_name'], $data['image_name'], '/imgs/POSTS/')) {
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
                    if($this->mentorDashboardModel->addPoster($data)) {
                                flash('post_message', 'Poster added');
                                redirect('mentors_dashboard/poster');
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
                    'image' => '',
                    'image_name' => '',
                    'id' => '',
                    'title' => '',
                    'body' => '',
                    'ups' => '',
                    'downs' => '',
                    'shares' => '',
                    'views' => '',

                    'title_err' => '',
                    'body_err' => ''
                ];
            }

            $this->view('mentors/posts/add', $data);
        }


        public function editBanner($id) {
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
                $post = $this->mentorDashboardModel->getBannerById($id);
                $oldImage = PUBROOT.'/imgs/POSTS/'.$post->image;

                if(updateImage($oldImage, $data['image']['tmp_name'], $data['image_name'], '/imgs/POSTS/')) {
                    // flash('profile_image_upload', 'Profile picture uploaded successfully');
                }
                else {
                    // upload unsuccessfull
                    // $data['profile_image_err'] = 'Profile picture uploading unsuccessful';
                    die('uns');
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
                    if($this->mentorDashboardModel->updateBanner($data)) {
                                flash('post_message', 'Banner Updated');
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
                $post = $this->mentorDashboardModel->getBannerById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('mentors_dashboard/banner');
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

            $this->view('mentors/posts/edit', $data);
        }


        public function editPoster($id) {
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
                $post = $this->mentorDashboardModel->getPosterById($id);
                $oldImage = PUBROOT.'/imgs/POSTS/'.$post->image;

                if(updateImage($oldImage, $data['image']['tmp_name'], $data['image_name'], '/imgs/POSTS/')) {
                    // flash('profile_image_upload', 'Profile picture uploaded successfully');
                }
                else {
                    // upload unsuccessfull
                    // $data['profile_image_err'] = 'Profile picture uploading unsuccessful';
                    die('uns');
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
                    if($this->mentorDashboardModel->updatePoster($data)) {
                        flash('post_message', 'Poster Updated');
                        redirect('mentors_dashboard/poster');
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
                $post = $this->mentorDashboardModel->getPosterById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('mentors_dashboard/poster');
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

            $this->view('mentors/posts/edit', $data);
        }

        public function showBanner($id) {
            $_SESSION['current_viewing_post_id'] = $id;

            $post = $this->mentorDashboardModel->getBannerById($id);
            $user = $this->commonModel->getUserById($post->user_id);

            $ups = $this->mentorDashboardModel->getIncBanner($id)->ups;
            $downs = $this->mentorDashboardModel->getDownBanner($id)->downs;

            $totalReviews = $this->mentorDashboardModel->getTotalReviewsForAPostById($id);

            $rateHaving1 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 1);
            $rateHaving2 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 2);
            $rateHaving3 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 3);
            $rateHaving4 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 4);
            $rateHaving5 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 5);

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

                'total_reviews' => $totalReviews,
                'rate1' => $rate1Precentage,
                'rate2' => $rate2Precentage,
                'rate3' => $rate3Precentage,
                'rate4' => $rate4Precentage,
                'rate5' => $rate5Precentage,
                'avg_rate' => $avgRate
            ];

            $this->view('mentors/posts/show', $data);
        }

        public function showPoster($id) {
            $_SESSION['current_viewing_post_id'] = $id;

            $post = $this->mentorDashboardModel->getPosterById($id);
            $user = $this->commonModel->getUserById($post->user_id);

            $ups = $this->mentorDashboardModel->getIncPoster($id)->ups;
            $downs = $this->mentorDashboardModel->getDownPoster($id)->downs;

            $totalReviews = $this->mentorDashboardModel->getTotalReviewsForAPostById($id);

            $rateHaving1 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 1);
            $rateHaving2 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 2);
            $rateHaving3 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 3);
            $rateHaving4 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 4);
            $rateHaving5 = $this->mentorDashboardModel->getRateAmountsForAPostById($id, 5);

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

                'total_reviews' => $totalReviews,
                'rate1' => $rate1Precentage,
                'rate2' => $rate2Precentage,
                'rate3' => $rate3Precentage,
                'rate4' => $rate4Precentage,
                'rate5' => $rate5Precentage,
                'avg_rate' => $avgRate
            ];

            $this->view('mentors/posts/show', $data);
        }

        public function deleteBanner($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $post = $this->mentorDashboardModel->getBannerById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('mentors_dashboard/banner');
                }
                
                if($this->mentorDashboardModel->deleteBanner($id)) {
                    flash('post_message', 'Banner Removed');
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

        public function deletePoster($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $post = $this->mentorDashboardModel->getPosterById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('mentors_dashboard/banner');
                }
                
                if($this->mentorDashboardModel->deletePoster($id)) {
                    flash('post_message', 'Poster Removed');
                    redirect('mentors_dashboard/poster');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                redirect('mentors_dashboard/poster');
            }
        }

        // For likes guider
        public function incUpBanner($id) {
            $ups = $this->mentorDashboardModel->incUpBanner($id);

            $userId = $_SESSION['user_id'];

            if($this->mentorDashboardModel->isPostInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->mentorDashboardModel->setPostInteraction($userId, $id, 'liked');
            }
            else {
                // If no previous interaction exists
                $res = $this->mentorDashboardModel->addPostInteraction($userId, $id, 'liked');
            }

            if($ups != false && $res != false) {
                echo $ups->ups;
            }
        }

        public function incUpPoster($id) {
            $ups = $this->mentorDashboardModel->incUpPoster($id);

            $userId = $_SESSION['user_id'];

            if($this->mentorDashboardModel->isPostInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->mentorDashboardModel->setPostInteraction($userId, $id, 'liked');
            }
            else {
                // If no previous interaction exists
                $res = $this->mentorDashboardModel->addPostInteraction($userId, $id, 'liked');
            }

            if($ups != false && $res != false) {
                echo $ups->ups;
            }
        }

        public function decUpBanner($id) {
            $ups = $this->mentorDashboardModel->decUpBanner($id);

            $userId = $_SESSION['user_id'];
            $res = $this->mentorDashboardModel->setPostInteraction($userId, $id, 'like removed');

            if($ups != false && $res != false) {
                echo $ups->ups;
            }    
        }

        public function decUpPoster($id) {
            $ups = $this->mentorDashboardModel->decUpPoster($id);

            $userId = $_SESSION['user_id'];
            $res = $this->mentorDashboardModel->setPostInteraction($userId, $id, 'like removed');

            if($ups != false && $res != false) {
                echo $ups->ups;
            }    
        }

        // For dislikes
        public function incDownBanner($id) {
            $downs = $this->mentorDashboardModel->incDownBanner($id);

            $userId = $_SESSION['user_id'];

            if($this->mentorDashboardModel->isPostInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->mentorDashboardModel->setPostInteraction($userId, $id, 'disliked');
            }
            else {
                // If no previous interaction exists
                $res = $this->mentorDashboardModel->addPostInteraction($userId, $id, 'disliked');
            }

            if($downs != false && $res != false) {
                echo $downs->downs;
            }    
        }

        public function incDownPoster($id) {
            $downs = $this->mentorDashboardModel->incDownPoster($id);

            $userId = $_SESSION['user_id'];

            if($this->mentorDashboardModel->isPostInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->mentorDashboardModel->setPostInteraction($userId, $id, 'disliked');
            }
            else {
                // If no previous interaction exists
                $res = $this->mentorDashboardModel->addPostInteraction($userId, $id, 'disliked');
            }

            if($downs != false && $res != false) {
                echo $downs->downs;
            }    
        }

        public function decDownBanner($id) {
            $downs = $this->mentorDashboardModel->decDownBanner($id);

            $userId = $_SESSION['user_id'];
            $res = $this->mentorDashboardModel->setPostInteraction($userId, $id, 'dislike removed');

            if($downs != false && $res != false) {
                echo $downs->downs;
            }    
        }

        public function decDownPoster($id) {
            $downs = $this->mentorDashboardModel->decDownPoster($id);

            $userId = $_SESSION['user_id'];
            $res = $this->mentorDashboardModel->setPostInteraction($userId, $id, 'dislike removed');

            if($downs != false && $res != false) {
                echo $downs->downs;
            }    
        }

        

        public function incShare() {

        }

        public function incView() {

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