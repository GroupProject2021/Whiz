<?php

class C_S_CV extends Controller {
    public function __construct() {
        $this->cvModel = $this->model('M_S_CV');
    }

    // Index
    public function index() {
        $this->view('students/opt_cv/v_cv');
    }

    // generate cv
    public function generateCV() {
        $this->view('students/opt_cv/v_generate_cv');
    }

    // upload custom cv
    public function uploadCustomCV() {
        $this->view('students/opt_cv/v_custom_cv');
    }

    // edit
    public function editCV() {
        $this->view('students/opt_cv/v_edit_cv');
    }
}

?>