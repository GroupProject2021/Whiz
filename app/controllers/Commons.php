<?php
    class Commons extends Controller {
        public function register() {
            $data = [];

            $this->view('common/user_register', $data);
        }
    }
?>