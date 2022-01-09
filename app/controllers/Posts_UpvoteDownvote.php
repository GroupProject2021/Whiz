<?php
    class Posts_UpvoteDownvote extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postUpvoteDownvoteModel = $this->model('Post_UpvoteDownvote');
        }

         // For likes
         public function incUp($id) {
            $ups = $this->postUpvoteDownvoteModel->incUp($id);

            $userId = $_SESSION['user_id'];

            if($this->postUpvoteDownvoteModel->isPostInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->postUpvoteDownvoteModel->setPostInteraction($userId, $id, 'liked');
            }
            else {
                // If no previous interaction exists
                $res = $this->postUpvoteDownvoteModel->addPostInteraction($userId, $id, 'liked');
            }

            if($ups != false && $res != false) {
                echo $ups->ups;
            }
        }

        public function decUp($id) {
            $ups = $this->postUpvoteDownvoteModel->decUp($id);

            $userId = $_SESSION['user_id'];
            $res = $this->postUpvoteDownvoteModel->setPostInteraction($userId, $id, 'like removed');

            if($ups != false && $res != false) {
                echo $ups->ups;
            }    
        }

        // For dislikes
        public function incDown($id) {
            $downs = $this->postUpvoteDownvoteModel->incDown($id);

            $userId = $_SESSION['user_id'];

            if($this->postUpvoteDownvoteModel->isPostInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->postUpvoteDownvoteModel->setPostInteraction($userId, $id, 'disliked');
            }
            else {
                // If no previous interaction exists
                $res = $this->postUpvoteDownvoteModel->addPostInteraction($userId, $id, 'disliked');
            }

            if($downs != false && $res != false) {
                echo $downs->downs;
            }    
        }

        public function decDown($id) {
            $downs = $this->postUpvoteDownvoteModel->decDown($id);

            $userId = $_SESSION['user_id'];
            $res = $this->postUpvoteDownvoteModel->setPostInteraction($userId, $id, 'dislike removed');

            if($downs != false && $res != false) {
                echo $downs->downs;
            }    
        }
    }
?>