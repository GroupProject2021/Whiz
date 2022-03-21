<?php
    class C_S_Stu_To_Notices extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post_IntakeNotices');
            $this->postUpvoteDownvoteModel = $this->model('Post_UpvoteDownvote');

            $this->commonModel = $this->model('Common');       
            
            $this->stuToNoticesModel = $this->model('M_S_Stu_To_Notices');
        }        

        // Index
        public function index() {
            // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
            URL_tamper_protection(['Student', 'Admin'], ['OL qualified', 'AL qualified', 'Admin']);

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
                    if($_SESSION['actor_type'] == "Admin") {
                        $posts = $this->postModel->filterAndGetPostsToIntakeNotices($posts_filter, $posts_filter_order);
                    }
                    else {
                        $posts = $this->postModel->filterAndGetPostsToIntakeNoticesAsMyNotices($posts_filter, $posts_filter_order);
                    }
                }
                else {
                    // Search bar applied
                    if($_SESSION['actor_type'] == "Admin") {
                        $posts = $this->postModel->searchAndGetPostsToIntakeNotices($posts_search);
                    }
                    else {
                        $posts = $this->postModel->searchAndGetPostsToIntakeNoticesAsMyNotices($posts_search);
                    }
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
                if($_SESSION['actor_type'] == "Admin") {
                    $posts = $this->postModel->filterAndGetPostsToIntakeNotices($posts_filter, $posts_filter_order);
                }
                else {
                    $posts = $this->postModel->filterAndGetPostsToIntakeNoticesAsMyNotices($posts_filter, $posts_filter_order);
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
        }
        
        // View job advertisement
        public function show($id) {
            // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
            URL_tamper_protection(['Student'], ['OL qualified', 'AL qualified']);

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