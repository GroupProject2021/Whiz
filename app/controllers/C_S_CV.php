<?php

class C_S_CV extends Controller {
    public function __construct() {
        $this->cvModel = $this->model('M_S_CV');
    }

    // Index
    public function index() {
        $this->view('students/opt_cv/v_cv');
    }
}

?>