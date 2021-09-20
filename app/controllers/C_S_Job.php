<?php

class C_S_Job extends Controller {
    public function __construct() {
        $this->jobModel = $this->model('M_S_CV');
    }

    public function index() {
        $this->view('students/opt_jobs/v_jobs_list');
    }
}

?>