<?php
    class Students_beginner_dashboard extends Controller {
        public function __construct() {
            $this->studentBeginnerDashboardModel = $this->model('Student_beginner_dashboard');
        }

        public function index() {
            $posts = $this->studentBeginnerDashboardModel->getPosts();
            $data = ['title' => 'Welcome to Students beginner dashboard', 'posts' => $posts];
            $this->view('students/beginner/student_beginner_dashboard', $data);
        }
    }
?>