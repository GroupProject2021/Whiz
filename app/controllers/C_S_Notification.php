<?php

class C_S_Notification extends Controller {
    public function __construct() {
        $this->notificationModel = $this->model('M_S_Notification');
    }

    public function index() {
        $this->view('students/opt_notifications/v_notifications');
    }
}

?>