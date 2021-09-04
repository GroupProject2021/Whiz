<?php
    class Pages extends Controller {
        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        public function index() {
            // if logged in directly go to the posts not home
            // if(isLoggedIn())
            // {
            //     redirect('posts');
            // }

            $posts = $this->postModel->getPosts();
            $data = ['title' => 'hi', 'posts' => $posts];
            $this->view('pages/index', $data);
        }

        public function about() {
            $data = ['title' => 'This is about page'];
            $this->view('pages/about', $data);
        }

    }
?>