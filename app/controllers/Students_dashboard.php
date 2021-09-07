<?php

use function PHPSTORM_META\map;

class Students_dashboard extends Controller {
        public function __construct() {
            $this->studentDashboardModel = $this->model('Student_dashboard');
        }

        public function index() {
            $posts = $this->studentDashboardModel->getPosts();
            $data = ['title' => 'Welcome to Students beginner dashboard', 'posts' => $posts];
            $this->view('students/student_dashboard', $data);
        }

        // For beginner
        // option 1 - stream selection
        public function streamSelection() {
            $streams = $this->studentDashboardModel->getStreams();
            
            $data = [
                'streams' => $streams
            ];

            $this->view('students/streamselection/stream_selection', $data);
        }

        public function streamSelectionRedirect($stream_id) {
            $stream_name = $this->studentDashboardModel->getStreamNameById($stream_id);
            $al_subject_list =  $this->studentDashboardModel->getALSubjectsById($stream_id);

            $data = [
                'stream_name' => $stream_name,
                'al_subject_list' => $al_subject_list
            ];

            $this->view('students/streamselection/stream_selection_redirect', $data);
        }

        // For OL qualified
        // option 1 - stream recommendation
        public function streamRecommendation() {
            $streams = $this->studentDashboardModel->getStreams();
            $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
            $studentOLData = $this->studentDashboardModel->getStudentOLDetails($id);

            $recommendedStreamList = $this->whizStreamRecommenadationAlgorithm($studentOLData);

            $data = [
                'streams' => $streams,
                'recommended_streams' => $recommendedStreamList
            ];            

            if($_SESSION['specialized_actor_type'] == 'OL qualified') {
                $this->view('students/streamrecommendation/stream_recommendation', $data);
            }
            else {
                die('Please upgrade to OL qualifed to unlock this feature');
            }
        }

        // whiz stream recommendation algorithm
        public function whizStreamRecommenadationAlgorithm($studentOLData) {
            // ORDER MATTERS - changing the order of keys may effect the output
            $rankArray = [
                'a' => '',  // art
                'c' => '',  // commerce
                's' => '',  // science
                'm' => '',  // maths
                't' => '',  // tech
                'o' => ''   // other
            ];

            $m = $this->getRank($studentOLData->ol_sub6_grade); //taking maths rank
            $s = $this->getRank($studentOLData->ol_sub5_grade); //taking science rank
            $a = $this->getRank($studentOLData->ol_sub2_grade); //taking sinhala rank

            $msa = ceil((($m + $s + $a) / 3)) ;

            if($studentOLData->ol_sub7_id == 12) {
                $c = $this->getRank($studentOLData->ol_sub7_grade); // taking commerce rank
            }
            else {
                $c = $msa;
            }

            if($studentOLData->ol_sub9_id == 46) {
                $t = $this->getRank($studentOLData->ol_sub7_grade); // taking tech rank
            }
            else {
                $t = $msa;
            }

            $o = $msa;

            // set rank array - remember order matters
            $rankArray = [
                'a' => $a,  // arts
                'c' => $c,  // commerce
                's' => $s,  // science
                'm' => $m,  // maths
                't' => $t,  // tech
                'o' => $o   // other
            ];

            // set array key names as actual stream names
            $rankArray = $this->replaceArrayKeyName($rankArray);
            

            // sort arrays
            arsort($rankArray);

            return $rankArray;
        }

        // replace array key names
        public function replaceArrayKeyName($array) {
            $replacedArray = [];
            $index = 1;

            foreach($array as $array => $array_value) {
                $replacedArray = array_merge($replacedArray, [$this->studentDashboardModel->getStreamNameById($index) => $array_value]);
                $index++;
            }

            return $replacedArray;
        }

        public function getRank($grade) {
            switch($grade) {
                case 'A': 
                    return 6;
                    break;
                case 'B': 
                    return 5;
                    break;
                case 'C': 
                    return 4;
                    break;
                case 'D': 
                    return 3;
                    break;
                case 'E': 
                    return 2;
                    break;
                case 'F': 
                    return 1;
                    break;
                default:
                    //nothing
                    break;
            }
        }

        // Settings
        public function settings() {
            $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);

            switch($_SESSION['specialized_actor_type']) {
                // For beginner
                case 'Beginner':
                   $studentData = $this->studentDashboardModel->getStudentDetails($id);

                    $data = [
                        'name' => $studentData->name,
                        'email' => $studentData->email,
                        'password' => $studentData->password,
                        'gender' => $studentData->gender,
                        'date_of_birth' => $studentData->date_of_birth,
                        'address' => $studentData->address,
                        'phn_no' => $studentData->phn_no
                    ];

                    $this->view('students/settings/settings_for_beginner', $data);
                    break;
                // For OL qualified
                case 'OL qualified':
                    $studentData = $this->studentDashboardModel->getStudentDetails($id);
                    $studentOLData = $this->studentDashboardModel->getStudentOLDetails($id);

                    $data = [
                        'name' => $studentData->name,
                        'email' => $studentData->email,
                        'password' => $studentData->password,
                        'gender' => $studentData->gender,
                        'date_of_birth' => $studentData->date_of_birth,
                        'address' => $studentData->address,
                        'phn_no' => $studentData->phn_no,

                        'ol_school' => $studentOLData->ol_school,
                        'ol_district' => $studentOLData->ol_district,
                        'ol_sub1_name' => $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub1_id),
                        'ol_sub1_grade' => $studentOLData->ol_sub1_grade,
                        'ol_sub2_name' => $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub2_id),
                        'ol_sub2_grade' => $studentOLData->ol_sub2_grade,
                        'ol_sub3_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub3_id),
                        'ol_sub3_grade' => $studentOLData->ol_sub3_grade,
                        'ol_sub4_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub4_id),
                        'ol_sub4_grade' => $studentOLData->ol_sub4_grade,
                        'ol_sub5_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub5_id),
                        'ol_sub5_grade' => $studentOLData->ol_sub5_grade,
                        'ol_sub6_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub6_id),
                        'ol_sub6_grade' => $studentOLData->ol_sub6_grade,
                        'ol_sub7_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub7_id),
                        'ol_sub7_grade' => $studentOLData->ol_sub7_grade,
                        'ol_sub8_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub8_id),
                        'ol_sub8_grade' => $studentOLData->ol_sub8_grade,
                        'ol_sub9_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub9_id),
                        'ol_sub9_grade' => $studentOLData->ol_sub9_grade
                    ];

                    $this->view('students/settings/settings_for_olqualified', $data);
                    break;
                // For AL qualified
                case 'AL qualified':
                    $studentData = $this->studentDashboardModel->getStudentDetails($id);                    
                    $studentOLData = $this->studentDashboardModel->getStudentOLDetails($id);
                    $studentALData = $this->studentDashboardModel->getStudentALDetails($id);

                    $data = [
                        'name' => $studentData->name,
                        'email' => $studentData->email,
                        'password' => $studentData->password,
                        'gender' => $studentData->gender,
                        'date_of_birth' => $studentData->date_of_birth,
                        'address' => $studentData->address,
                        'phn_no' => $studentData->phn_no,

                        'ol_school' => $studentOLData->ol_school,
                        'ol_district' => $studentOLData->ol_district,
                        'ol_sub1_name' => $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub1_id),
                        'ol_sub1_grade' => $studentOLData->ol_sub1_grade,
                        'ol_sub2_name' => $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub2_id),
                        'ol_sub2_grade' => $studentOLData->ol_sub2_grade,
                        'ol_sub3_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub3_id),
                        'ol_sub3_grade' => $studentOLData->ol_sub3_grade,
                        'ol_sub4_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub4_id),
                        'ol_sub4_grade' => $studentOLData->ol_sub4_grade,
                        'ol_sub5_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub5_id),
                        'ol_sub5_grade' => $studentOLData->ol_sub5_grade,
                        'ol_sub6_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub6_id),
                        'ol_sub6_grade' => $studentOLData->ol_sub6_grade,
                        'ol_sub7_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub7_id),
                        'ol_sub7_grade' => $studentOLData->ol_sub7_grade,
                        'ol_sub8_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub8_id),
                        'ol_sub8_grade' => $studentOLData->ol_sub8_grade,
                        'ol_sub9_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub9_id),
                        'ol_sub9_grade' => $studentOLData->ol_sub9_grade,

                        'al_school' => $studentALData->al_school,
                        'al_district' => $studentALData->al_district,
                        'stream' => $studentALData->stream,
                        'stream_name' => $this->studentDashboardModel->getStreamNameById($studentALData->stream),
                        'z_score' => $studentALData->z_score,
                        'al_general_test_grade' => $studentALData->al_general_test_grade,
                        'al_general_english_grade' => $studentALData->al_general_english_grade,
                        'al_sub1_name' =>  $this->studentDashboardModel->getALSubjectName($studentALData->al_sub1_id),
                        'al_sub1_grade' => $studentALData->al_sub1_grade,
                        'al_sub2_name' =>  $this->studentDashboardModel->getALSubjectName($studentALData->al_sub2_id),
                        'al_sub2_grade' => $studentALData->al_sub2_grade,
                        'al_sub3_name' =>  $this->studentDashboardModel->getALSubjectName($studentALData->al_sub3_id),
                        'al_sub3_grade' => $studentALData->al_sub3_grade
                    ];

                    $this->view('students/settings/settings_for_alqualified', $data);
                    break;
                // For Undergraduate Graduate
                case 'Undergraduate Graduate':
                    $studentData = $this->studentDashboardModel->getStudentDetails($id);                    
                    $studentOLData = $this->studentDashboardModel->getStudentOLDetails($id);
                    $studentALData = $this->studentDashboardModel->getStudentALDetails($id);
                    $uniData = $this->studentDashboardModel->getStudentUniversity($id);

                    $data = [
                        'name' => $studentData->name,
                        'email' => $studentData->email,
                        'password' => $studentData->password,
                        'gender' => $studentData->gender,
                        'date_of_birth' => $studentData->date_of_birth,
                        'address' => $studentData->address,
                        'phn_no' => $studentData->phn_no,

                        'ol_school' => $studentOLData->ol_school,
                        'ol_district' => $studentOLData->ol_district,
                        'ol_sub1_name' => $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub1_id),
                        'ol_sub1_grade' => $studentOLData->ol_sub1_grade,
                        'ol_sub2_name' => $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub2_id),
                        'ol_sub2_grade' => $studentOLData->ol_sub2_grade,
                        'ol_sub3_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub3_id),
                        'ol_sub3_grade' => $studentOLData->ol_sub3_grade,
                        'ol_sub4_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub4_id),
                        'ol_sub4_grade' => $studentOLData->ol_sub4_grade,
                        'ol_sub5_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub5_id),
                        'ol_sub5_grade' => $studentOLData->ol_sub5_grade,
                        'ol_sub6_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub6_id),
                        'ol_sub6_grade' => $studentOLData->ol_sub6_grade,
                        'ol_sub7_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub7_id),
                        'ol_sub7_grade' => $studentOLData->ol_sub7_grade,
                        'ol_sub8_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub8_id),
                        'ol_sub8_grade' => $studentOLData->ol_sub8_grade,
                        'ol_sub9_name' =>  $this->studentDashboardModel->getOLSubjectName($studentOLData->ol_sub9_id),
                        'ol_sub9_grade' => $studentOLData->ol_sub9_grade,

                        'al_school' => $studentALData->al_school,
                        'al_district' => $studentALData->al_district,
                        'stream' => $studentALData->stream,
                        'stream_name' => $this->studentDashboardModel->getStreamNameById($studentALData->stream),
                        'z_score' => $studentALData->z_score,
                        'al_general_test_grade' => $studentALData->al_general_test_grade,
                        'al_general_english_grade' => $studentALData->al_general_english_grade,
                        'al_sub1_name' =>  $this->studentDashboardModel->getALSubjectName($studentALData->al_sub1_id),
                        'al_sub1_grade' => $studentALData->al_sub1_grade,
                        'al_sub2_name' =>  $this->studentDashboardModel->getALSubjectName($studentALData->al_sub2_id),
                        'al_sub2_grade' => $studentALData->al_sub2_grade,
                        'al_sub3_name' =>  $this->studentDashboardModel->getALSubjectName($studentALData->al_sub3_id),
                        'al_sub3_grade' => $studentALData->al_sub3_grade,

                        'uni_name' => $uniData->uni_name,
                        'degree' => $uniData->degree,
                        'gpa' => $uniData->gpa
                    ];

                    $this->view('students/settings/settings_all', $data);
                    break;
                default:
                    break;
            }
            
        }

        public function editSettingsBeginner() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'gender' => trim($_POST['gender']),
                    'date_of_birth' => trim($_POST['date_of_birth']),
                    'address' => trim($_POST['address']),
                    'phn_no' => trim($_POST['phn_no']),

                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'gender_err' => '',
                    'date_of_birth_err' => '',
                    'address_err' => '',
                    'phn_no_err' => '',
                ];

                // Validate title
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate body
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                // Validate body
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // Validate body
                if(empty($data['gender'])) {
                    $data['gender_err'] = 'Please enter gender';
                }

                // Validate body
                if(empty($data['date_of_birth'])) {
                    $data['date_of_birth_err'] = 'Please enter date of birth';
                }

                // Validate body
                if(empty($data['address'])) {
                    $data['address_err'] = 'Please enter address';
                }

                // Validate body
                if(empty($data['phn_no'])) {
                    $data['phn_no_err'] = 'Please enter phone number';
                }

                // Make sure no errors
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['gender_err'])
                    && empty($data['date_of_birth_err']) && empty($data['address_err']) && empty($data['phn_no_err'])) {
                    // Validated                    
                    $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
                    if($this->studentDashboardModel->updateStudentSettings($id, $data)) {
                        flash('settings_message', 'Student data updated');
                        redirect('students_dashboard/settings');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('students/settings/edit_settings_beginner', $data);
                }
            }
            else {
                $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
                // Get existing post from model                
                $studentData = $this->studentDashboardModel->getStudentDetails($id);

                $data = [
                    'name' => $studentData->name,
                    'email' => $studentData->email,
                    'password' => $studentData->password,
                    'gender' => $studentData->gender,
                    'date_of_birth' => $studentData->date_of_birth,
                    'address' => $studentData->address,
                    'phn_no' => $studentData->phn_no,

                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'gender_err' => '',
                    'date_of_birth_err' => '',
                    'address_err' => '',
                    'phn_no_err' => '',
                ];
            }

            $this->view('students/settings/edit_settings_beginner', $data);
        }

        public function editSettingsOL() {
            $district_list = $this->studentDashboardModel->getDistricts();
            $ol_subject_list = $this->studentDashboardModel->getOLSubjects();

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init data
                $data = [
                    'district_list' => $district_list,
                    'ol_subject_list' => $ol_subject_list,

                    'ol_school' => trim($_POST['ol_school']),
                    'ol_district' => trim($_POST['ol_district']),
                    'ol_sub1_id' => $_POST['religion'],
                    'radio_religion' => $_POST['radio_religion'],
                    'ol_sub2_id' => $_POST['primary_language'],
                    'radio_primary_language' => $_POST['radio_primary_language'],
                    'ol_sub3_id' => $_POST['secondary_language'],
                    'radio_secondary_language' => $_POST['radio_secondary_language'],
                    'ol_sub4_id' => $_POST['history'],
                    'radio_history' => $_POST['radio_history'],
                    'ol_sub5_id' => $_POST['science'],
                    'radio_science' => $_POST['radio_science'],
                    'ol_sub6_id' => $_POST['mathematics'],
                    'radio_mathematics' => $_POST['radio_mathematics'],
                    'ol_sub7_id' => $_POST['basket1'],
                    'radio_basket_1' => $_POST['radio_basket_1'],
                    'ol_sub8_id' => $_POST['basket2'],
                    'radio_basket_2' => $_POST['radio_basket_2'],
                    'ol_sub9_id' => $_POST['basket3'],
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
                if(empty($data['radio_religion']) || empty($data['radio_primary_language']) || empty($data['radio_secondary_language']) ||
                    empty($data['radio_history']) || empty($data['radio_science']) || empty($data['radio_mathematics']) ||
                    empty($data['radio_basket_1']) || empty($data['radio_basket_2']) || empty($data['radio_basket_3'])) {
                        $data['ol_results_err'] = 'Please check whether you have selected all the ol result check boxes';
                }

                // Make sure all errors are empty
                if(empty($data['ol_school_err']) && empty($data['ol_district_err']) && empty($data['ol_results_err'])) {
                    // Validated                    
                    $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
                    if($this->studentDashboardModel->updateStudentOLSettings($id, $data)) {
                        flash('settings_message', 'OL data updated');
                        redirect('students_dashboard/settings');
                    }
                    else {
                        die('Something went wrong');
                    }            
                }
                else {
                    // Load with errors
                    $this->view('students/settings/edit_settings_olqualified', $data);
                }
            }
            else {
                $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
                // Get existing post from model                
                $studentData = $this->studentDashboardModel->getStudentOLDetails($id);

                // Init data
                $data = [
                    'district_list' => $district_list,
                    'ol_subject_list' => $ol_subject_list,

                    'ol_school' => $studentData->ol_school,
                    'ol_district' => $studentData->ol_district,
                    'ol_sub1_id' => $studentData->ol_sub1_id,
                    'radio_religion' => $studentData->ol_sub1_grade,
                    'ol_sub2_id' => $studentData->ol_sub2_id,
                    'radio_primary_language' => $studentData->ol_sub2_grade,
                    'ol_sub3_id' => $studentData->ol_sub3_id,
                    'radio_secondary_language' => $studentData->ol_sub3_grade,
                    'ol_sub4_id' => $studentData->ol_sub4_id,
                    'radio_history' => $studentData->ol_sub4_grade,
                    'ol_sub5_id' => $studentData->ol_sub5_id,
                    'radio_science' => $studentData->ol_sub5_grade,
                    'ol_sub6_id' => $studentData->ol_sub6_id,
                    'radio_mathematics' => $studentData->ol_sub6_grade,
                    'ol_sub7_id' => $studentData->ol_sub7_id,
                    'radio_basket_1' => $studentData->ol_sub7_grade,
                    'ol_sub8_id' => $studentData->ol_sub8_id,
                    'radio_basket_2' => $studentData->ol_sub8_grade,
                    'ol_sub9_id' => $studentData->ol_sub9_id,
                    'radio_basket_3' => $studentData->ol_sub9_grade,

                    'ol_school_err' => '',
                    'ol_district_err' => '',
                    'ol_results_err' => ''
                ];
            }

            $this->view('students/settings/edit_settings_olqualified', $data);
        }

        public function editSettingsAL() {
            $district_list = $this->studentDashboardModel->getDistricts();
            $stream_list = $this->studentDashboardModel->getStreams();
            $al_subject_list = $this->studentDashboardModel->getALSubjects();

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
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
                    'radio_general_english' => $_POST['radio_general_english'],
                    'al_sub1_id' => $_POST['subject1'],
                    'radio_subject_1' => $_POST['radio_subject_1'],
                    'al_sub2_id' => $_POST['subject2'],
                    'radio_subject_2' => $_POST['radio_subject_2'],
                    'al_sub3_id' => $_POST['subject3'],
                    'radio_subject_3' => $_POST['radio_subject_3'],

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
                    // Validated                    
                    $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
                    if($this->studentDashboardModel->updateStudentALSettings($id, $data)) {
                        flash('settings_message', 'AL data updated');
                        redirect('students_dashboard/settings');
                    }
                    else {
                        die('Something went wrong');
                    }                  
                }
                else {
                    // Load view with errors
                    $this->view('students/settings/edit_settings_alqualified', $data);
                }
            }
            else {
                $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
                // Get existing post from model                
                $studentData = $this->studentDashboardModel->getStudentALDetails($id);

                // Init data
                $data = [
                    'district_list' => $district_list,
                    'stream_list' => $stream_list,
                    'al_subject_list' => $al_subject_list, 

                    'al_school' => $studentData->al_school,
                    'stream' => $studentData->stream,
                    'z_score' => $studentData->z_score,
                    'al_district' => $studentData->al_district,
                    'general_test_grade' => $studentData->al_general_test_grade,
                    'radio_general_english' => $studentData->al_general_english_grade,  
                    'al_sub1_id' => $studentData->al_sub1_id,                  
                    'radio_subject_1' => $studentData->al_sub1_grade,
                    'al_sub2_id' => $studentData->al_sub2_id,
                    'radio_subject_2' => $studentData->al_sub2_grade,
                    'al_sub3_id' => $studentData->al_sub3_id,
                    'radio_subject_3' => $studentData->al_sub3_grade,

                    'al_school_err' => '',
                    'stream_err' => '',
                    'z_score_err' => '',
                    'al_district_err' => '',
                    'general_test_grade_err' => '',
                    'radio_general_english_err' => '',
                    'al_results_err' => ''
                ];
            }

            $this->view('students/settings/edit_settings_alqualified', $data);
        }

        public function editSettingsUG() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'degree' => trim($_POST['degree']),
                    'uni_name' => trim($_POST['uni_name']),
                    'gpa' => trim($_POST['gpa']),

                    'degree_err' => '',
                    'uni_name_err' => '',
                    'gpa_err' => ''
                ];

                // Validate
                if(empty($data['degree'])) {
                    $data['degree_err'] = 'Please enter degree name';
                }

                if(empty($data['uni_name'])) {
                    $data['uni_name_err'] = 'Please enter university name';
                }

                if(empty($data['gpa'])) {
                    $data['gpa_err'] = 'Please enter gpa';
                }

                // Make sure no errors
                if(empty($data['degree_err']) && empty($data['uni_name_err']) && empty($data['gpa_err'])) {
                    // Validated                    
                    $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
                    if($this->studentDashboardModel->updateStudentUGSettings($id, $data)) {
                        flash('settings_message', 'University data updated');
                        redirect('students_dashboard/settings');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('students/settings/edit_settings_undergradgrad', $data);
                }
            }
            else {
                $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
                // Get existing post from model                
                $studentData = $this->studentDashboardModel->getStudentUniversity($id);

                $data = [
                    'degree' => $studentData->degree,
                    'uni_name' => $studentData->uni_name,
                    'gpa' => $studentData->gpa,

                    'degree_err' => '',
                    'uni_name_err' => '',
                    'gpa_err' => ''
                ];
            }

            $this->view('students/settings/edit_settings_undergradgrad', $data);
        }

    }
?>