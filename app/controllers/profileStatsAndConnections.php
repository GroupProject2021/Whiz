<?php
    class profileStatsAndConnections extends Controller {
        public function __construct() {
            $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
        }

        public function followers() {
            $data = [];
            $this->view('students/profileStatsAndConnections/v_student_followers', $data);
        }

        public function followings() {
            $data = [];
            $this->view('students/profileStatsAndConnections/v_student_following', $data);
        }

        public function follow($id) {
            $me = $_SESSION['user_id'];

            if($this->profileStatAndConnectionModel->addFollower($me, $id)) {
                // nothing for now
                return print_r($this->countFollowers($id));
            }
        }

        public function unfollow($id) {            
            $me = $_SESSION['user_id'];

            if($this->profileStatAndConnectionModel->removeFollower($me)) {
                // nothing for now
                redirect('C_S_Settings/settings/'.$id);
                return print_r($this->countFollowers($id));
            }
        }

        public function countFollowers($id) {
            $count = $this->profileStatAndConnectionModel->getFollowerCount($id);

            return $count;
        }
    }
?>