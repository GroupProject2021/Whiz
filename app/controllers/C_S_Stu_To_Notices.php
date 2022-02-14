<?php
    class C_S_Stu_To_Notices extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('M_O_U_Notice');
            $this->postUpvoteDownvoteModel = $this->model('Post_UpvoteDownvote');

            $this->commonModel = $this->model('Common');       
            
            $this->stuToNoticesModel = $this->model('M_S_Stu_To_Notices');
        }        

        // Index
        public function index() {
            // Get posts
            // $posts = $this->postModel->getPosts();
            // $posts = $this->stuToNoticesModel->getNotices();
            
            // $data = [
            //     'posts' => $posts
            // ];

            // $this->view('students/opt_notices/v_notice_list', $data);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $posts_filter = trim($_POST['filter']);
                $posts_filter_order = trim($_POST['filter-order']);

                $posts_search = trim($_POST['post-search']);
    
                // courses & intake notices
                $intakeNoticesAmount = $this->postModel->getIntakeNoticesAmount();
                
                // filtering
                if(empty($posts_search)) {
                    $posts = $this->postModel->filterAndGetPostsToIntakeNotices($posts_filter, $posts_filter_order);
                }
                else {
                    // Search bar applied
                    $posts = $this->postModel->searchAndGetPostsToIntakeNotices($posts_search);
                }
    
    
                $data = [
                    'intake_notices_amount' => $intakeNoticesAmount,
    
                    'posts_filter' => $posts_filter,
                    'posts_filter_order' => $posts_filter_order,

                    'post_search' => $posts_search,
    
                    'posts' => $posts
                ];
                
                $this->view('students/opt_notices/v_notice_list', $data);
            }
            else {
                $posts_filter = 'all';
                $posts_filter_order = 'desc';

                $posts_search = '';
    
                // courses & intake notices
                $intakeNoticesAmount = $this->postModel->getIntakeNoticesAmount();
                
                // filtering
                $posts = $this->postModel->filterAndGetPostsToIntakeNotices($posts_filter, $posts_filter_order);
    
    
                $data = [
                    'intake_notices_amount' => $intakeNoticesAmount,
    
                    'posts_filter' => $posts_filter,
                    'posts_filter_order' => $posts_filter_order,

                    'post_search' => $posts_search,
    
                    'posts' => $posts
                ];
                
                $this->view('students/opt_notices/v_notice_list', $data);
            }
        }

        
        // View job advertisement
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