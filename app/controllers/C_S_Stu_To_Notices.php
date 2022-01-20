<?php
    class C_S_Stu_To_Notices extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('M_O_U_Notice');
            $this->postUpvoteDownvoteModel = $this->model('Post_UpvoteDownvote');
            $this->commentModel = $this->model('Comment');    

            $this->commonModel = $this->model('Common');       
            
            $this->stuToCompanyModel = $this->model('M_S_Stu_To_Company');
        }        

        // Index
        public function index() {
            // Get posts
            // $posts = $this->postModel->getPosts();
            $posts = $this->postModel->getPosts();
            
            $data = [
                'posts' => $posts
            ];

            $this->view('students/opt_notices/v_notice_list', $data);
        }

        
        // View job advertisement
        public function show($id) {
            // if post not exist
            if(!($this->postModel->isPostExist($id))) {
                $this->index();
                return;
            }

            $_SESSION['current_viewing_post_id'] = $id;
            $_SESSION['currect_viewing_post_type'] = "Notice";

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


            $data = [
                'post' => $post,
                'user' => $user,

                'ups' => $ups,
                'downs' => $downs,
                'self_interaction' => $selfInteraction
            ];

            $this->view('students/opt_notices/v_notice_viewMore', $data);            
        }
        
    }
?>