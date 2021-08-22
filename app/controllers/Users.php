<?php
    class Users extends Controller {
        public function __construct() {
            $this->postModel = $this->model('User');
        }

        public function login(){
            $data = ['title' => 'This is login page'];
            $this->view('users/login',$data);

        }

        public function index() {

        }

    }
?>  
