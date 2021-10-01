<?php
    class Reviews extends Controller {
        public function __construct() {
            $this->reviewModel = $this->model('Review');
        }

        public function viewAll() {
            $reviews = $this->reviewModel->getReviews();

            $data = ['reviews' => $reviews];

            $this->view('reviews/view_all_reviews', $data);
        }

        public function add() {
            $postId = $_SESSION['current_viewing_post_id'];
            $userId = $_SESSION['user_id'];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [                    
                    'post_id' => $postId,
                    'user_id' => $userId,
                    'rate' => trim($_POST['rate_amount']),
                    'review_text' => trim($_POST['review_text'])
                ];


                // Validated
                if($this->reviewModel->addReview($data)) {
                    redirect('Reviews/viewAll');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                $data = [
                    'post_id' => '',
                    'user_id' => '',
                    'rate' => '',
                    'review_text' => '',
                ];
            }

            $this->view('reviews/add_review', $data);
        }

        public function edit($id) {
            $postId = $_SESSION['current_viewing_post_id'];
            $userId = $_SESSION['user_id'];

            $review = $this->reviewModel->getReviewById($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'review_id' => $id,
                    'post_id' => $postId,
                    'user_id' => $userId,
                    'rate' => trim($_POST['rate_amount']),
                    'review_text' => trim($_POST['review_text'])
                ];


                // Validated
                if($this->reviewModel->updateReview($data)) {
                    redirect('Reviews/viewAll');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                $data = [
                    'review_id' => $review->review_id,
                    'post_id' => '',
                    'user_id' => '',
                    'rate' => $review->rate,
                    'review_text' => $review->review,
                ];
            }

            $this->view('reviews/edit_review', $data);
        }

        public function delete($id) {
            // Get existing post from model
            $review = $this->reviewModel->getReviewById($id);

            // Check for owner
            if($review->user_id != $_SESSION['user_id']) {
                redirect('Reviews/viewAll');
            }
                
            if($this->reviewModel->deleteReview($id)) {
                // flash('post_message', 'Post Removed');
                redirect('Reviews/viewAll');
            }
            else {
                die('Something went wrong');
            }
        }
    }
?>