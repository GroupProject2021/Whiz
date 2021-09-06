<?php
    class Mentors_dashboard extends Controller{
        public function __construct() {
            $this->mentorDashboardModel = $this->model('Mentor_dashboard');
        }

        public function index() {
            $posts = $this->mentorDashboardModel->getPosts();
            $data = ['title' => 'Welcome to Professional Guider dashboard', 'posts' => $posts];
            $this->view('mentors/professional_guider/prof_guide_dashboard', $data);
        }

        

        
    }

?>