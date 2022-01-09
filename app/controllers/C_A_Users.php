<?php

class C_A_Users extends Controller {
    public function __construct() {
        $this->usersModel = $this->model('M_A_Users');
    }

    public function reports() {
        $reportList = $this->usersModel->getReports();

        $data = [
            'report_list' => $reportList
        ];

        $this->view('admin/opt_users/reports', $data);
    }

    public function deleteReportedAccount($id) {
        if($this->usersModel->deleteReportedAccount($id)) {
            flash('delete_acc', 'Reported account deleted');
            redirect('C_A_Users/reports');
        }
        else {
            die('Something went wrong');
        }
    }
}

?>