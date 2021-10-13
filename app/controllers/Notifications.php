<?php
    class Notifications extends Controller {
        public function __construct() {
            $this->notificationModel = $this->model('Notification');
        }
    }
?>