<?php

class C_S_Stu_To_University extends Controller {
    public function __construct() {
        $this->universityModel = $this->model('M_S_Stu_To_University');
    }

    public function index() {
        $this->view('students/opt_universities/v_university');
    }
}

?>