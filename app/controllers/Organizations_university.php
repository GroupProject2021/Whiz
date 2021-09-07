<?php
    class Organizations_university extends Controller {
        public function __construct() {
            $this->postModel = $this->model('Organization_university');
        }

        function signindex() {
            $this->view->render('organization/university/signup');
        }

        function signup() {
            $user_name=$_POST['user_name'];
            $email_id=$_POST['email_id'];
            $password=$_POST['password'];
            $count=$this->postmodel->check_user($user_name,$email_id);

            if($count > 0){
                echo 'This User Already Exists';
            }
            else{
                $data = array(
                    'id' =>null,
                    'user_name' =>$_POST['user_name'],
                    'email_id' =>$_POST['email_id'],
                    'password' =>$_POST['password']
                );
                $this->postmodel->insert_user($data);
            }
        header('location:index');
        }
    }
?>
