<?php
    class profileStatsAndConnections extends Controller {
        public function __construct() {
            $this->profileStatAndConnectionModel = $this->model('profileStatAndConnection');
            $this->notificationModel = $this->model('Notification');
        }

        // Search user
        public function searchUserByName($name) {
            $userList = $this->profileStatAndConnectionModel->getUsersByName($name);

            foreach($userList as $user) {
                switch($user->actor_type) {
                    case 'Student': 
                            echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$user->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                            break;
                    case 'Organization': 
                            echo '<a href="'.URLROOT.'/C_O_Settings/settings/'.$user->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                            break;
                    case 'Mentor': 
                            echo '<a href="'.URLROOT.'/C_M_Settings/settings/'.$user->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                            break;
                    default: 
                            break;
                }

                echo '<div class="show-userlist-item">';
                echo    '<div class="item-pic"><img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($user->actor_type).'/'.$user->profile_image.'" alt=""></div>';
                echo    '<div class="item-name">'.$user->first_name.' '.$user->last_name.'</div>';
                echo    '<div class="item-type">'.$user->actor_type.' | '.$user->specialized_actor_type.'</div>';
                echo '</div>';
                echo '</a>';
            }
        }
  

        // Followers
        // Initial followers list
        public function followers($id) {
            $followerList = $this->profileStatAndConnectionModel->getFollowers($id);

            $data = ['followers' => $followerList];

            $this->view('connections/v_student_followers', $data);
        }

        // All user list
        public function existingAllFollowerUserList() {
            $userList = $this->profileStatAndConnectionModel->getFollowers($_SESSION['user_id']);

            $this->generateUserList($userList);
        }

        // All user list with respect to actor type or specialized actor type
        public function existingFollowerUserList($type) {
            $userList = $this->profileStatAndConnectionModel->getExistingFollowersUserList($type, $_SESSION['user_id']);

            $this->generateUserList($userList);
        }


        // Followings
        // Initial following list
        public function followings($id) {
            $followingList = $this->profileStatAndConnectionModel->getFollowings($id);

            $data = ['following' => $followingList];

            $this->view('connections/v_student_following', $data);
        }

        // All user list
        public function existingAllFollowingUserList() {
            $userList = $this->profileStatAndConnectionModel->getFollowings($_SESSION['user_id']);

            $this->generateUserList($userList);
        }

        // All user list with respect to actor type or specialized actor type
        public function existingFollowingUserList($type) {
            $userList = $this->profileStatAndConnectionModel->getExistingFollowingUserList($type, $_SESSION['user_id']);

            $this->generateUserList($userList);
        }

        
        // Generate user list
        public function generateUserList($userList) {
            foreach($userList as $user) {
                switch($user->actor_type) {
                    case 'Student': 
                            echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$user->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                            break;
                    case 'Organization': 
                            echo '<a href="'.URLROOT.'/C_O_Settings/settings/'.$user->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                            break;
                    case 'Mentor': 
                            echo '<a href="'.URLROOT.'/C_M_Settings/settings/'.$user->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                            break;
                    default: 
                            break;
                }

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


        // To follow a user - real time updates using AJAX
        public function follow($id) {
            $me = $_SESSION['user_id'];

            if($this->profileStatAndConnectionModel->addFollower($me, $id)) {
                // nothing for now

                // SEND NOTIFICATIONS
                $senderId = $me;
                $receiverID = $id;
                $notification = 'follows you';
                $this->notificationModel->sendNotification($senderId, $receiverID, $notification);

                return print_r($this->countFollowers($id));
            }
        }

        // To unfollow a user - real time updates using AJAX
        public function unfollow($id) {            
            $me = $_SESSION['user_id'];

            if($this->profileStatAndConnectionModel->removeFollower($me, $id)) {
                // nothing for now

                $removed_follower_actor_type = $this->profileStatAndConnectionModel->getActorType($id);
                switch($removed_follower_actor_type) {
                    case 'Student':
                        redirect('C_S_Settings/settings/'.$id.'/'.$me);
                        break;

                    case 'Mentor':
                        redirect('C_M_Settings/settings/'.$id.'/'.$me);
                        break;

                    case 'Organization':
                        redirect('C_O_Settings/settings/'.$id.'/'.$me);
                        break;
                }

                return print_r($this->countFollowers($id));
            }
        }

        // To update in real time using AJAX
        public function countFollowers($id) {
            $count = $this->profileStatAndConnectionModel->getFollowerCount($id);

            return $count;
        }
    }
?>