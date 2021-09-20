<?php

class C_S_Stu_To_ProfessionalGuider extends Controller {
    public function __construct() {
        $this->proGuiderModel = $this->model('M_S_Stu_To_ProfessionalGuider');
    }

    public function index() {
        $this->view('students/opt_proGuiders/v_proGuiders_list');
    }
}

?>