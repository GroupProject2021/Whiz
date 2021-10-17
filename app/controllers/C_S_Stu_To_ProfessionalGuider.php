<?php
    class C_S_Stu_To_ProfessionalGuider extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post');
            $this->commentModel = $this->model('Comment');            
            $this->reviewModel = $this->model('Review');

            $this->commonModel = $this->model('Common');            
        }        

        // Index
        public function index() {
            // Get posts
            $posts = $this->postModel->getPosts();
            $postsReviewssAndRates = $this->reviewModel->getPostsReviewsAndRates();

            $data = [
                'posts' => $posts,
                'reviews_rates' => $postsReviewssAndRates
            ];

            $this->view('students/opt_proGuiders/v_proGuiders_banner_list', $data);
        }


        // View banner
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

            $this->view('students/opt_proGuiders/v_proGuiders_banner_viewMore', $data);

            
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