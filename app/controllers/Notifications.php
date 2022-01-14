<?php
    class Notifications extends Controller {
        public function __construct() {
            $this->notificationModel = $this->model('Notification');
        }

        public function sendNotification($senderId, $receiverID, $notification) {
            if($this->notificationModel->sendNotification($senderId, $receiverID, $notification)) {
                // do nothing
            }
            else {
                die('Notification send failed');
            }
        }

        public function getNotifications($receiverID) {
            $notifications = $this->notificationModel->getNotifications($receiverID);

            foreach($notifications as $notification) {
                echo '<div class="notification">';
                echo    '<div class="left">';
                echo        '<div class="pic">';
                switch($notification->actor_type) {
                    case 'Student': 
                        echo            '<img src="'.URLROOT.'/profileimages/student/'.$notification->profile_image.'" alt="">';
                            break;
                    case 'Organization': 
                        echo            '<img src="'.URLROOT.'/profileimages/organization/'.$notification->profile_image.'" alt="">';
                            break;
                    case 'Mentor': 
                        echo            '<img src="'.URLROOT.'/profileimages/mentor/'.$notification->profile_image.'" alt="">';
                            break;
                    case 'Admin':
                        echo            '<img src="'.URLROOT.'/profileimages/admin/'.$notification->profile_image.'" alt="">';
                            break;
                    default: 
                            break;
                }
                echo        '</div>';
                echo    '</div>';
                echo    '<div class="right">';
                echo        '<div class="text">';
                switch($notification->actor_type) {
                    case 'Student': 
                        echo            '<a class="post-link" href="'.URLROOT.'/C_S_Settings/settings/'.$notification->sender_id.'/'.$_SESSION['user_id'].'">';
                            break;
                    case 'Organization': 
                        echo            '<a class="post-link" href="'.URLROOT.'/C_O_Settings/settings/'.$notification->sender_id.'/'.$_SESSION['user_id'].'">';
                            break;
                    case 'Mentor': 
                        echo            '<a class="post-link" href="'.URLROOT.'/C_M_Settings/settings/'.$notification->sender_id.'/'.$_SESSION['user_id'].'">';
                            break;
                    case 'Admin':
                        echo            '<a class="post-link" href="">';
                            break;
                    default: 
                            break;
                }
                echo            '<b>'.$notification->first_name.' '.$notification->last_name.' </b>';
                echo            '</a>';
                echo            $notification->notification;
                echo        '</div>';
                echo        '<div class="notfied-at">';
                echo            convertedToReadableTimeFormat($notification->send_at);
                echo        '</div>';
                echo    '</div>';
                echo '</div>';          
            }
        }
    }
?>