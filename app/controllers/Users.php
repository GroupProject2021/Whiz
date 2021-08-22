<?php
    class Users extends Controller {
        public function __construct() {
            $this->postModel = $this->model('User');
        }

        public function login(){
            $users = $this->postModel->getUsers();
            $data = ['title' => 'This is login page','users' => $users];
            $this->view('users/login',$data);

        }

        public function index() {

        }

    }
?>  
