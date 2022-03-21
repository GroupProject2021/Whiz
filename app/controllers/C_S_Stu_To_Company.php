<?php
    class C_S_Stu_To_Company extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post_JobAds');
            $this->postUpvoteDownvoteModel = $this->model('Post_UpvoteDownvote');
            $this->commentModel = $this->model('Comment');            
            $this->reviewModel = $this->model('Review');

            $this->commonModel = $this->model('Common');       
            
            $this->stuToCompanyModel = $this->model('M_S_Stu_To_Company');
        }        

        // Index
        public function index() {
            // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
            URL_tamper_protection(['Student', 'Admin'], ['Beginner', 'OL qualified', 'AL qualified', 'Undergraduate Graduate', 'Admin']);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $posts_filter = trim($_POST['filter']);
                $posts_filter_order = trim($_POST['filter-order']);

                $posts_search = trim($_POST['post-search']);
    
                // courses & intake notices
                $coursesAmount = $this->postModel->getJobAdsAmount();
                
                // filtering
                if(empty($posts_search)) {
                    $posts = $this->postModel->filterAndGetPostsToJobAds($posts_filter, $posts_filter_order);
                }
                else {
                    // Search bar applied
                    $posts = $this->postModel->searchAndGetPostsToJobAds($posts_search);
                }
    
                $data = [
                    'courses_amount' => $coursesAmount,
    
                    'posts_filter' => $posts_filter,
                    'posts_filter_order' => $posts_filter_order,

                    'post_search' => $posts_search,
    
                    'posts' => $posts
                ];
                
                $this->view('students/opt_jobs/v_jobs_advertisement_list', $data);
            }
            else {
                $posts_filter = 'all';
                $posts_filter_order = 'desc';

                $posts_search = '';
    
                // courses & intake notices
                $coursesAmount = $this->postModel->getJobAdsAmount();
                
                // filtering
                $posts = $this->postModel->filterAndGetPostsToJobAds($posts_filter, $posts_filter_order);
                // serach criteria is not necessary because its initial loading
    
    
                $data = [
                    'courses_amount' => $coursesAmount,
    
                    'posts_filter' => $posts_filter,
                    'posts_filter_order' => $posts_filter_order,

                    'post_search' => $posts_search,
    
                    'posts' => $posts
                ];
                
                $this->view('students/opt_jobs/v_jobs_advertisement_list', $data);
            }
        }

        
        // View job advertisement
        public function show($id) {
            // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
            URL_tamper_protection(['Student'], ['Beginner', 'OL qualified', 'AL qualified', 'Undergraduate Graduate']);

            // if post not exist
            if(!($this->postModel->isPostExist($id))) {
                $this->index();
                return;
            }

            $_SESSION['current_viewing_post_id'] = $id;
            $_SESSION['currect_viewing_post_type'] = "Advertisement";

            $post = $this->postModel->getPostById($id);
            $user = $this->commonModel->getUserById($post->company_id);

            $ups = $this->postUpvoteDownvoteModel->getInc($id)->ups;
            $downs = $this->postUpvoteDownvoteModel->getDown($id)->downs;
            $userId = $_SESSION['user_id'];

            // for like dislike existence
            if($this->postUpvoteDownvoteModel->isPostInterationExist($userId, $id)) {
                $selfInteraction = $this->postUpvoteDownvoteModel->getPostInteration($userId, $id);
                $selfInteraction = $selfInteraction->interaction;
            }
            else {
                $selfInteraction = '';
            }

            // for job apply existence
            if($this->stuToCompanyModel->isJobApplyExist($userId, $id)) {
                $selfJobApplyInteraction = $this->stuToCompanyModel->getJobApply($userId, $id);
                $selfJobApplyInteraction = $selfJobApplyInteraction->interaction;
            }
            else {
                $selfJobApplyInteraction = '';
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

            $isCVExists = $this->stuToCompanyModel->isCVExist($_SESSION['user_id']);

            $data = [
                'post' => $post,
                'user' => $user,

                'ups' => $ups,
                'downs' => $downs,
                'self_interaction' => $selfInteraction,
                'self_job_apply_interaction' => $selfJobApplyInteraction,

                'total_reviews' => $totalReviews,
                'rate1' => $rate1Precentage,
                'rate2' => $rate2Precentage,
                'rate3' => $rate3Precentage,
                'rate4' => $rate4Precentage,
                'rate5' => $rate5Precentage,
                'avg_rate' => $avgRate,

                'is_cv_exists' => $isCVExists
            ];

            $this->view('students/opt_jobs/v_jobs_advertisement_viewMore', $data);            
        }

        // LIKES DISLIKES REMOVED

        
        // For job applyings
        public function incApply($id) {
            $applies = $this->stuToCompanyModel->incApply($id);

            $userId = $_SESSION['user_id'];

            if($this->stuToCompanyModel->isJobApplyExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->stuToCompanyModel->setJobApply($userId, $id, 'applied');
            }
            else {
                // If no previous interaction exists
                $res = $this->stuToCompanyModel->addJobApply($userId, $id, 'applied');
            }

            if($applies != false && $res != false) {
                // add cv as well
                $cvId = $this->stuToCompanyModel->getCVIdByUserId($userId);
                $this->stuToCompanyModel->addCVtoPost($id, $userId, $cvId);

                echo $applies->applied;
            }    
        }

        public function decApply($id) {
            $applies = $this->stuToCompanyModel->decApply($id);

            $userId = $_SESSION['user_id'];
            $res = $this->stuToCompanyModel->setJobApply($userId, $id, 'apply removed');

            if($applies != false && $res != false) {
                // delete the applied cv from table
                $this->stuToCompanyModel->deleteCVFromPost($id, $userId);

                echo $applies->applied;
            }    
        }
        
    }
?>