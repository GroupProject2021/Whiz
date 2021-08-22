<?php
    class Pages {
        public function __construct() {
            echo 'Pages loaded';
        }

        public function index() {
            
        }

        public function about($id) {
            echo 'this is about and params are '.$id;
        }
    }
?>