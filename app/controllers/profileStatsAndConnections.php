<?php
    class profileStatsAndConnections extends Controller {
        public function __construct() {
            $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
        }

        public function followers($id) {
            $followerList = $this->profileStatAndConnectionModel->getFollowers($id);

            $data = ['followers' => $followerList];

            $this->view('students/connections/v_student_followers', $data);
        }
        
        public function followings($id) {
            $followingList = $this->profileStatAndConnectionModel->getFollowings($id);

            $data = ['following' => $followingList];

            $this->view('students/connections/v_student_following', $data);
        }

        // to follow a user - real time updates using AJAX
        public function follow($id) {
            $me = $_SESSION['user_id'];

            if($this->profileStatAndConnectionModel->addFollower($me, $id)) {
                // nothing for now
                return print_r($this->countFollowers($id));
            }
        }

        // to unfollow a user - real time updates using AJAX
        public function unfollow($id) {            
            $me = $_SESSION['user_id'];

            if($this->profileStatAndConnectionModel->removeFollower($me, $id)) {
                // nothing for now
                redirect('C_S_Settings/settings/'.$id);
                return print_r($this->countFollowers($id));
            }
        }

        // to update in real time using AJAX
        public function countFollowers($id) {
            $count = $this->profileStatAndConnectionModel->getFollowerCount($id);

            return $count;
        }
    }
?>