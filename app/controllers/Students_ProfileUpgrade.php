<?php
    class Students_ProfileUpgrade extends Controller {
        public function __construct() {
            $this->studentProfileUpgrade = $this->model('Student_ProfileUpgrade');
        }

        public function upgradeToOlQualified() {
            $district_list = $this->studentProfileUpgrade->getDistricts();
            $ol_subject_list = $this->studentProfileUpgrade->getOLSubjects();

            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'district_list' => $district_list,
                    'ol_subject_list' => $ol_subject_list,

                    'ol_school' => trim($_POST['ol_school']),
                    'ol_district' => trim($_POST['ol_district']),
                    'radio_mathematics' => $_POST['radio_mathematics'],
                    'radio_science' => $_POST['radio_science'],
                    'radio_english' => $_POST['radio_english'],
                    'radio_sinhala' => $_POST['radio_sinhala'],
                    'radio_history' => $_POST['radio_history'],
                    'radio_religion' => $_POST['radio_religion'],
                    'radio_basket_1' => $_POST['radio_basket_1'],
                    'radio_basket_2' => $_POST['radio_basket_2'],
                    'radio_basket_3' => $_POST['radio_basket_3'],
                    
                    'ol_school_err' => '',
                    'ol_district_err' => '',
                    'ol_results_err' => ''
                ];

                // Validate OL school
                if(empty($data['ol_school'])) {
                    $data['ol_school_err'] = 'Please enter your OL school name';
                }

                // Validate OL district
                if(empty($data['ol_district'])) {
                    $data['ol_district_err'] = 'Please enter your OL district';
                }

                // Validate Ol results
                if(empty($data['radio_mathematics']) || empty($data['radio_science']) || empty($data['radio_english']) ||
                    empty($data['radio_sinhala']) || empty($data['radio_history']) || empty($data['radio_religion']) ||
                    empty($data['radio_basket_1']) || empty($data['radio_basket_2']) || empty($data['radio_basket_3'])) {
                        $data['ol_results_err'] = 'Please check whether you have selected all the ol result check boxes';
                }

                // Make sure all errors are empty
                if(empty($data['ol_school_err']) && empty($data['ol_district_err']) && empty($data['ol_results_err'])) {
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
                    'district_list' => $district_list,
                    'ol_subject_list' => $ol_subject_list,

                    'ol_school' => '',
                    'ol_district' => '',
                    'radio_mathematics' => '',
                    'radio_science' => '',
                    'radio_english' => '',
                    'radio_sinhala' => '',
                    'radio_history' => '',
                    'radio_religion' => '',
                    'radio_basket_1' => '',
                    'radio_basket_2' => '',
                    'radio_basket_3' => '',

                    'ol_school_err' => '',
                    'ol_district_err' => '',
                    'ol_results_err' => ''
                ];

                // Load view
                $this->view('students/upgrades/beginner_to_olqualified', $data);
            }
        }

        public function upgradeToAlQualified() {
            $district_list = $this->studentProfileUpgrade->getDistricts();
            $stream_list = $this->studentProfileUpgrade->getStreams();
            $al_subject_list = $this->studentProfileUpgrade->getALSubjects();

            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'district_list' => $district_list,
                    'stream_list' => $stream_list,
                    'al_subject_list' => $al_subject_list,                    

                    'al_school' => trim($_POST['al_school']),
                    'stream' => trim($_POST['stream']),
                    'z_score' => trim($_POST['z_score']),
                    'al_district' => trim($_POST['al_district']),
                    'general_test_grade' => trim($_POST['general_test_grade']),
                    'radio_general_english' => trim($_POST['radio_general_english']),
                    'radio_subject_1' => trim($_POST['radio_subject_1']),
                    'radio_subject_2' => trim($_POST['radio_subject_2']),
                    'radio_subject_3' => trim($_POST['radio_subject_3']),

                    'al_school_err' => '',
                    'stream_err' => '',
                    'z_score_err' => '',
                    'al_district_err' => '',
                    'general_test_grade_err' => '',
                    'radio_general_english_err' => '',
                    'al_results_err' => ''
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
                if(empty($data['radio_general_english'])) {
                    $data['radio_general_english_err'] = 'Please enter your general test grade';
                }

                // Validate general english grade
                if(empty($data['general_english_grade'])) {
                    $data['general_english_grade_err'] = 'Please enter your english grade';
                }

                if(empty($data['radio_subject_1']) || empty($data['radio_subject_2']) || empty($data['radio_subject_3'])) {
                    $data['al_results_err'] = 'Please check whether you have selected all the al result check boxes';
                }

                // Make sure all errors are empty
                if(empty($data['al_school_err']) && empty($data['stream_err']) && empty($data['z_score_err'])
                    && empty($data['al_district_err']) && empty($data['general_test_grade_err']) && empty($data['radio_general_english_err'])
                    && empty($data['al_results_err'])) {
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
                    'district_list' => $district_list,
                    'stream_list' => $stream_list,
                    'al_subject_list' => $al_subject_list, 

                    'al_school' => '',
                    'stream' => '',
                    'z_score' => '',
                    'al_district' => '',
                    'general_test_grade' => '',
                    'radio_general_english' => '',                    
                    'radio_subject_1' => '',
                    'radio_subject_2' => '',
                    'radio_subject_3' => '',

                    'al_school_err' => '',
                    'stream_err' => '',
                    'z_score_err' => '',
                    'al_district_err' => '',
                    'general_test_grade_err' => '',
                    'radio_general_english_err' => '',
                    'al_results_err' => ''
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
                    'uni_type' => trim($_POST['uni_type']), 
                    'uni_name' => trim($_POST['uni_name']),
                    'degree' => trim($_POST['degree']),
                    'gpa' => trim($_POST['gpa']),

                    'uni_type_err' => '',
                    'uni_name_err' => '',
                    'degree_err' => '',
                    'gpa_err' => ''
                ];

                // Validate uni type
                if(empty($data['uni_type'])) {
                    $data['uni_type_err'] = 'Please enter your university type';
                }

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
                    'uni_type' => '', 
                    'uni_name' => '',
                    'degree' => '',
                    'gpa' => '',

                    'uni_type_err' => '',
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