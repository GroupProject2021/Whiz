<?php

class C_S_Stu_To_Company extends Controller {
    public function __construct() {
        $this->companyModel = $this->model('M_S_Stu_To_Company');
    }

    public function index() {
        $this->view('students/opt_companies/v_company_list');
    }
}

?>