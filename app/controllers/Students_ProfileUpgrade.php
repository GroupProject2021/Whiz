<?php
    class Students_ProfileUpgrade extends Controller {
        public function __construct() {
            $this->studentProfileUpgrade = $this->model('Student_ProfileUpgrade');
        }

        public function upgradeToOlQualified() {
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
                    if($this->studentProfileUpgrade->registerOLqualified($_SESSION['user_id'], $data)) {
                        // i added later
                        $this->updateSession();

                        redirect('Students_dashboard');
                    }
                    else {
                        die('Something went wrong');
                    }                    
                }
                else {
                    // Load with errors
                    $this->view('students/upgrades/beginner_to_olqualified', $data);
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
                $this->view('students/upgrades/beginner_to_olqualified', $data);
            }
        }

        public function upgradeToAlQualified() {
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
                    if($this->studentProfileUpgrade->registerALqualified($_SESSION['user_id'], $data)) {         
                        // i added later
                        $this->updateSession();

                        redirect('Students_dashboard');
                    }
                    else {
                        die('Something went wrong');
                    }                           
                }
                else {
                    // Load with errors
                    $this->view('students/upgrades/olqualified_to_alqualified', $data);
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
                $this->view('students/upgrades/olqualified_to_alqualified', $data);
            }
        }

        public function upgradeToUndergraduateGraduate() {
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
                    // Register data
                    if($this->studentProfileUpgrade->registerUndergraduateGraduate($_SESSION['user_id'], $data)) {
                        // i added later
                        $this->updateSession();

                        redirect('Students_dashboard');
                    }
                    else {
                        die('Something went wrong');
                    }       
                }
                else {
                    // Load with errors
                    $this->view('students/upgrades/alqualified_to_undergraduategraduate', $data);
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
                $this->view('students/upgrades/alqualified_to_undergraduategraduate', $data);
            }
        }

        // To update the existing session - i added later
        public function updateSession() {
            $user = $this->studentProfileUpgrade->getUpdatedSession($_SESSION['user_id']);

            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            // added later
            $_SESSION['actor_type'] = $user->actor_type;
            $_SESSION['specialized_actor_type'] = $user->specialized_actor_type;
        }
    }
?>