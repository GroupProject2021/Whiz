<?php
    class Students_dashboard extends Controller {
        public function __construct() {
            $this->studentDashboardModel = $this->model('Student_dashboard');
        }

        public function index() {
            $posts = $this->studentDashboardModel->getPosts();
            $data = ['title' => 'Welcome to Students dashboard', 'posts' => $posts];
            $this->view('students/student_dashboard', $data);
        }
    }
?>