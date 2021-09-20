<?php

class C_S_Stu_To_Teacher extends Controller {
    public function __construct() {
        $this->teacherModel = $this->model('M_S_Stu_To_Teacher');
    }

    public function index() {
        $this->view('students/opt_teachers/v_teachers_list');
    }
}

?>