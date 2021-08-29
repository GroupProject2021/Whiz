<?php
    class Students_alQualified_upgradeScreen extends Controller {
        public function __construct() {
            $this->studentAlQualifiedUpgradeScreen = $this->model('Student_alQualified_upgradeScreen');
        }

        public function register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'al_school' => trim($_POST['al_school']),
                    'stream' => trim($_POST['stream']),
                    'z_score' => trim($_POST['z_score']),
                    'al_district' => trim($_POST['al_district']),
                    'general_test_grade' => trim($_POST['general_test_grade']),
                    'general_english_grade' => trim($_POST['general_english_grade']),
                    'al_school_err' => '',
                    'stream_err' => '',
                    'z_score_err' => '',
                    'al_district_err' => '',
                    'general_test_grade_err' => '',
                    'general_english_grade_err' => ''
                ];

                // Validate AL school
                if(empty($data['al_school'])) {
                    $data['al_school_err'] = 'Please enter your AL school name';
                }

                // Validate stream
                if(empty($data['stream'])) {
                    $data['stream_err'] = 'Please enter your stream';
                }

                // Validate z score
                if(empty($data['z_score'])) {
                    $data['z_score_err'] = 'Please enter your z score';
                }

                // Validate AL district
                if(empty($data['al_district'])) {
                    $data['al_district_err'] = 'Please enter your AL district';
                }

                // Validate general test grade
                if(empty($data['general_test_grade'])) {
                    $data['general_test_grade_err'] = 'Please enter your general test grade';
                }

                // Validate general english grade
                if(empty($data['general_english_grade'])) {
                    $data['general_english_grade_err'] = 'Please enter your english grade';
                }

                // Make sure all errors are empty
                if(empty($data['al_school_err']) && empty($data['stream_err']) && empty($data['z_score_err'])
                    && empty($data['al_district_err']) && empty($data['general_test_grade_err']) && empty($data['general_english_grade_err'])) {
                    // Register data
                    if($this->studentAlQualifiedUpgradeScreen->register($data)) {
                        redirect('Students_undergradGrad_upgradeScreen/register');
                    }
                    else {
                        die('Something went wrong');
                    }                           
                }
                else {
                    // Load with errors
                    $this->view('students/alqualified/student_alqualified_upgradescreen', $data);
                }
            }
            else {
                // Init data
                $data = [
                    'al_school' => '',
                    'stream' => '',
                    'z_score' => '',
                    'al_district' => '',
                    'general_test_grade' => '',
                    'general_english_grade' => '',
                    'al_school_err' => '',
                    'stream_err' => '',
                    'z_score_err' => '',
                    'al_district_err' => '',
                    'general_test_grade_err' => '',
                    'general_english_grade_err' => ''
                ];

                // Load view
                $this->view('students/alqualified/student_alqualified_upgradescreen', $data);
            }
        }
    }
?>