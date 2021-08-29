<?php
    class Students_olQualified_upgradeScreen extends Controller {
        public function __construct() {
            $this->studentOlQualifiedUpgradeScreen = $this->model('Student_olQualified_upgradeScreen');
        }

        public function register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'ol_school' => trim($_POST['ol_school']),
                    'ol_district' => trim($_POST['ol_district']),
                    'ol_school_err' => '',
                    'ol_district_err' => ''
                ];

                // Validate OL school
                if(empty($data['ol_school'])) {
                    $data['ol_school_err'] = 'Please enter your OL school name';
                }

                // Validate OL district
                if(empty($data['ol_district'])) {
                    $data['ol_district_err'] = 'Please enter your OL district';
                }

                // Make sure all errors are empty
                if(empty($data['ol_school_err']) && empty($data['ol_district_err'])) {
                    // Register data
                    if($this->studentOlQualifiedUpgradeScreen->register($data)) {
                        redirect('Students_alQualified_upgradeScreen/register');
                    }
                    else {
                        die('Something went wrong');
                    }                    
                }
                else {
                    // Load with errors
                    $this->view('students/olqualified/student_olqualified_upgradescreen', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'ol_school' => '',
                    'ol_district' => '',
                    'ol_school_err' => '',
                    'ol_district_err' => ''
                ];

                // Load view
                $this->view('students/olqualified/student_olqualified_upgradescreen', $data);
            }
        }
    }
?>