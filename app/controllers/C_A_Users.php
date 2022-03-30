<?php

class C_A_Users extends Controller {
    public function __construct() {
        $this->usersModel = $this->model('M_A_Users');
    }

    public function reports() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        $reportList = $this->usersModel->getReports();

        $data = [
            'report_list' => $reportList
        ];

        $this->view('admin/opt_users/reports', $data);
    }

    public function deleteReportedAccount($id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);
        
        if($this->usersModel->deleteReportedAccount($id)) {
            flash('delete_acc', 'Reported account deleted');
            redirect('C_A_Users/reports');
        }
        else {
            die('Something went wrong');
        }
    }

    public function confirmation($id) {
        $data = [
            'report_id' => $id
        ];

        $this->view('admin/opt_users/report_delete_confirmation', $data);
    }
}

?>