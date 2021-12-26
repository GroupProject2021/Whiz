<?php
    class CommunityThreads extends Controller {
        public function __construct() {
            $this->communityModel = $this->model('CommunityThread');
        }

        // Index
        public function index() {
            $this->view('common/community_thread');
        }
    }
?>