<?php

class C_S_Course extends Controller {
    public function __construct() {
        $this->courseModel = $this->model('M_S_Course');
    }

    public function index() {
        $this->view('students/opt_courses/v_course_selection');
    }
}

?>