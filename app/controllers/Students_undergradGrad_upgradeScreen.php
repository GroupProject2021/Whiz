<?php
    class Students_undergradGrad_upgradeScreen extends Controller {
        public function __construct() {
            $this->studentUndergradGradUpgradeScreen = $this->model('Student_undergradGrad_upgradeScreen');
        }

        public function idle() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'uni_name' => trim($_POST['uni_name']),
                    'degree' => trim($_POST['degree']),
                    'gpa' => trim($_POST['gpa']),
                    'uni_name_err' => '',
                    'degree_err' => '',
                    'gpa_err' => ''
                ];

                // Validate uni name
                if(empty($data['uni_name'])) {
                    $data['uni_name_err'] = 'Please enter your university name';
                }

                // Validate degree
                if(empty($data['degree'])) {
                    $data['degree_err'] = 'Please enter your degree';
                }

                // Validate gpa
                if(empty($data['gpa'])) {
                    $data['gpa_err'] = 'Please enter your gpa';
                }

                // Make sure all errors are empty
                if(empty($data['uni_name_err']) && empty($data['degree_err']) && empty($data['gpa_err'])) {
                    redirect('students/login');
                }
                else {
                    // Load with errors
                    $this->view('students/undergradGrad/student_undergradGrad_upgradescreen', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'uni_name' => '',
                    'degree' => '',
                    'gpa' => '',
                    'uni_name_err' => '',
                    'degree_err' => '',
                    'gpa_err' => ''
                ];

                // Load view
                $this->view('students/undergradGrad/student_undergradGrad_upgradescreen', $data);
            }
        }
    }
?>