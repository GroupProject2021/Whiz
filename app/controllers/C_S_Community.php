<?php

class C_S_Community extends Controller {
    public function __construct() {
        $this->communityModel = $this->model('M_S_Community');
    }

    public function index() {
        $this->view('students/opt_community/v_comment_section');
    }
}

?>