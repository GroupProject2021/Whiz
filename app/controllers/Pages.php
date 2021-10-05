<?php
    class Pages extends Controller {
        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        public function index() {
            $this->view('pages/index');
        }

        public function about() {
            $this->view('pages/about');
        }

        public function help() {
            $this->view('pages/help');
        }

        public function privacy() {
            $this->view('pages/privacy');
        }

        public function contactus() {
            $this->view('pages/contactus');
        }

        public function services() {
            $this->view('pages/services');
        }
    }
?>