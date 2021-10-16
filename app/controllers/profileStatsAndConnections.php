<?php
    class profileStatsAndConnections extends Controller {
        public function __construct() {
            $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
        }

        // search user
        public function searchUserByName($name) {
            $userList = $this->profileStatAndConnectionModel->getUsersByName($name);

            foreach($userList as $user) {
                echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$user->id.'" class="card-link">';
                echo '<div class="show-userlist-item">';
                echo    '<div class="item-pic"><img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($user->actor_type).'/'.$user->profile_image.'" alt=""></div>';
                echo    '<div class="item-name">'.$user->first_name.' '.$user->last_name.'</div>';
                echo    '<div class="item-type">'.$user->actor_type.' | '.$user->specialized_actor_type.'</div>';
                echo '</div>';
                echo '</a>';
            }
        }
  


        // initial followers list
        public function followers($id) {
            $followerList = $this->profileStatAndConnectionModel->getFollowers($id);

            $data = ['followers' => $followerList];

            $this->view('students/connections/v_student_followers', $data);
        }

        // all user list
        public function existingAllFollowerUserList() {
            $userList = $this->profileStatAndConnectionModel->getFollowers($_SESSION['user_id']);

            $this->generateUserList($userList);
        }

        // all user list with respect to actor type or specialized actor type
        public function existingFollowerUserList($type) {
            $userList = $this->profileStatAndConnectionModel->getExistingFollowersUserList($type, $_SESSION['user_id']);

            $this->generateUserList($userList);
        }


        
        // initial following list
        public function followings($id) {
            $followingList = $this->profileStatAndConnectionModel->getFollowings($id);

            $data = ['following' => $followingList];

            $this->view('students/connections/v_student_following', $data);
        }

        // all user list
        public function existingAllFollowingUserList() {
            $userList = $this->profileStatAndConnectionModel->getFollowings($_SESSION['user_id']);

            $this->generateUserList($userList);
        }

        // all user list with respect to actor type or specialized actor type
        public function existingFollowingUserList($type) {
            $userList = $this->profileStatAndConnectionModel->getExistingFollowingUserList($type, $_SESSION['user_id']);

            $this->generateUserList($userList);
        }

        

        public function generateUserList($userList) {
            foreach($userList as $user) {
                echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$user->id.'" class="card-link">';
                echo '<div class="user-block">';
                echo    '<div class="pic"><img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($user->actor_type).'/'.$user->profile_image.'" alt=""></div>';
                echo    '<div class="name">'.$user->first_name.' '.$user->last_name.'</div>';
                if($user->status == 'verified'){
                    echo    '<div class="verified"><img src="'.URLROOT.'/imgs/verified.png" alt=""></div>';
                }
                echo '<div class="types">'.$user->actor_type.' | '.$user->specialized_actor_type.'</div>';
                echo '</div>';
                echo '</a>';
            }
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