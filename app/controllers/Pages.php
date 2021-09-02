<?php
    class Pages extends Controller {
        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        public function index() {
            // if logged in rirectly go to the posts not home
            // if(isLoggedIn())
            // {
            //     redirect('posts');
            // }

            $posts = $this->postModel->getPosts();
            $data = ['title' => 'welcome', 'posts' => $posts];
            $this->view('pages/index', $data);
        }

        public function about() {
            $data = ['title' => 'This is about page'];
            $this->view('pages/about', $data);
        }

    }
?>