<?php
    class Comments extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->commentModel = $this->model('Comment');           
        }

        // Add comments
        public function comment($id) {
            $userId = $_SESSION['user_id'];
            $postId = $id;
            $commentContent = $_POST['post-comment'];


            echo 'user: '.$userId.' post: '.$postId.' comment: '.$commentContent;

            $data = [
                'post_id' => $postId,
                'user_id' => $userId,
                'content' => $commentContent,
                'ups' => 0,
                'downs' => 0
            ];

            if($this->commentModel->addComment($data)) {
                echo 'success';
            }
            else {
                echo 'failed';
            }
        }

        // For comment likes
        public function incCommentUp($id) {
            $ups = $this->commentModel->incCommentUp($id);

            $userId = $_SESSION['user_id'];

            if($this->commentModel->isCommentInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->commentModel->setCommentInteraction($userId, $id, 'liked');
            }
            else {
                // If no previous interaction exists
                $res = $this->commentModel->addCommentInteraction($userId, $id, 'liked');
            }

            if($ups != false && $res != false) {
                echo $ups->ups;
            }
        }

        public function decCommentUp($id) {
            $ups = $this->commentModel->decCommentUp($id);

            $userId = $_SESSION['user_id'];
            $res = $this->commentModel->setCommentInteraction($userId, $id, 'like removed');

            if($ups != false && $res != false) {
                echo $ups->ups;
            }    
        }

        // For comment dislikes
        public function incCommentDown($id) {
            $downs = $this->commentModel->incCommentDown($id);

            $userId = $_SESSION['user_id'];

            if($this->commentModel->isCommentInterationExist($userId, $id)) {
                // If already an interaction exists
                $res = $this->commentModel->setCommentInteraction($userId, $id, 'disliked');
            }
            else {
                // If no previous interaction exists
                $res = $this->commentModel->addCommentInteraction($userId, $id, 'disliked');
            }

            if($downs != false && $res != false) {
                echo $downs->downs;
            }
        }

        public function decCommentDown($id) {
            $downs = $this->commentModel->decCommentDown($id);

            $userId = $_SESSION['user_id'];
            $res = $this->commentModel->setCommentInteraction($userId, $id, 'dislike removed');

            if($downs != false && $res != false) {
                echo $downs->downs;
            }    
        }

        public function deleteComment($id) {
            if($this->commentModel->deleteComment($id)) {
                // flash('post_message', 'Post Removed');
                // redirect('Reviews/viewAll/'.$_SESSION['current_viewing_post_id']);
            }
            else {
                die('Something went wrong');
            }
        }
        

        // Load comments
        public function showComments($id) {
            $comments = $this->commentModel->getComments($id);

            // RENDER COMMENTS
            foreach($comments as $comment) {
                $user = $this->commentModel->getUserDetails($comment->user_id);
                $userProfileImgURL = URLROOT.'/profileimages/'.getActorTypeForIcons($user->actor_type).'/'.$user->profile_image;
                $userActorTypeImgURL = URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($user->actor_type).'-'.getActorSpecializedTypeForIcons($user->actor_type, $user->specialized_actor_type).'-icon.png';
                
                $userId = $_SESSION['user_id'];

                if($this->commentModel->isCommentInterationExist($userId, $comment->comment_id)) {
                    $selfInteraction = $this->commentModel->getCommentInteration($userId, $comment->comment_id);
                    $selfInteraction = $selfInteraction->comment_interaction;
                }
                else {
                    $selfInteraction = '';
                }

                echo '<div class="comment">';
                echo '<div class="comment-header">';
                echo    '<div class="comment-header-icon"><img src="'.$userProfileImgURL.'" alt=""></div>';
                echo    '<div class="comment-header-actortypeicon"><img src="'.$userActorTypeImgURL.'" alt=""></div>';
                echo    '<div class="comment-header-postedby">'.$user->first_name.' '.$user->last_name.'</div>';
                if($user->status == "verified") {
                    echo    '<div class="comment-header-verified"><img src="'.URLROOT.'/imgs/verified.png" alt=""></div>';
                }                
                echo    '<div class="comment-header-postedtime">'.convertedToReadableTimeFormat($comment->created_at).'</div>';
                if($comment->user_id == $_SESSION["user_id"]) {
                    // echo     '<div class="comment-edit"><img src="'.URLROOT.'/imgs/components/commentSystem/edit-icon.png" alt="" onclick="deleteComment('.$comment->comment_id.')"></div>';
                    echo     '<div class="comment-delete"><img src="'.URLROOT.'/imgs/components/commentSystem/remove-icon.png" alt="" onclick="deleteComment('.$comment->comment_id.')"></div>';    
                }
                echo '</div>';
                echo '<div class="comment-body">';
                echo    $comment->content;
                echo '</div>';
                echo '<div class="comment-footer">';
                echo '<button>';
                if($selfInteraction == "liked") {
                echo    '<div class="comment-footer-likebtn active" id="comment_likebtn'.$comment->comment_id.'" onclick="addCommentUp('.$comment->comment_id.')"><img src="'.URLROOT.'/imgs/components/posts/up-icon.png" alt=""></div>';
                }
                else{                
                echo    '<div class="comment-footer-likebtn" id="comment_likebtn'.$comment->comment_id.'" onclick="addCommentUp('.$comment->comment_id.')"><img src="'.URLROOT.'/imgs/components/posts/up-icon.png" alt=""></div>';
                }
                echo    '<div class="comment-footer-text" id="comment-like-count'.$comment->comment_id.'">'.$comment->ups.'</div>';
                echo '</button>';
                echo '<button>';
                if($selfInteraction == "disliked") {
                echo    '<div class="comment-footer-dislikebtn active" id="comment_dislikebtn'.$comment->comment_id.'" onclick="addCommentDown('.$comment->comment_id.')"><img src="'.URLROOT.'/imgs/components/posts/down-icon.png" alt=""></div>';
                }
                else{
                echo    '<div class="comment-footer-dislikebtn" id="comment_dislikebtn'.$comment->comment_id.'" onclick="addCommentDown('.$comment->comment_id.')"><img src="'.URLROOT.'/imgs/components/posts/down-icon.png" alt=""></div>';
                }
                echo    '<div class="comment-footer-text" id="comment-dislike-count'.$comment->comment_id.'">'.$comment->downs.'</div>';
                echo '</button>';
                //echo '<button>';
                //echo    '<div class="comment-footer-replybtn"><img src="'.URLROOT.'/imgs/components/posts/reply-icon.png" alt=""></div>';
                //echo    '<div class="comment-footer-text">reply</div>';
                //echo '</button>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
?>