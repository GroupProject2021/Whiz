<?php
    class Students_dashboard extends Controller {
        public function __construct() {
            $this->studentDashboardModel = $this->model('Student_dashboard');
        }

        public function index() {
            $posts = $this->studentDashboardModel->getPosts();
            $data = ['title' => 'Welcome to Students beginner dashboard', 'posts' => $posts];
            $this->view('students/student_dashboard', $data);
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
                        'ol_sub1_grade' => $studentOLData->ol_sub1_grade,
                        'ol_sub2_grade' => $studentOLData->ol_sub2_grade,
                        'ol_sub3_grade' => $studentOLData->ol_sub3_grade,
                        'ol_sub4_grade' => $studentOLData->ol_sub4_grade,
                        'ol_sub5_grade' => $studentOLData->ol_sub5_grade,
                        'ol_sub6_grade' => $studentOLData->ol_sub6_grade,
                        'ol_sub7_grade' => $studentOLData->ol_sub7_grade,
                        'ol_sub8_grade' => $studentOLData->ol_sub8_grade,
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
                        'ol_sub1_grade' => $studentOLData->ol_sub1_grade,
                        'ol_sub2_grade' => $studentOLData->ol_sub2_grade,
                        'ol_sub3_grade' => $studentOLData->ol_sub3_grade,
                        'ol_sub4_grade' => $studentOLData->ol_sub4_grade,
                        'ol_sub5_grade' => $studentOLData->ol_sub5_grade,
                        'ol_sub6_grade' => $studentOLData->ol_sub6_grade,
                        'ol_sub7_grade' => $studentOLData->ol_sub7_grade,
                        'ol_sub8_grade' => $studentOLData->ol_sub8_grade,
                        'ol_sub9_grade' => $studentOLData->ol_sub9_grade,

                        'al_school' => $studentALData->al_school,
                        'al_district' => $studentALData->al_district,
                        'stream' => $studentALData->stream,
                        'z_score' => $studentALData->z_score,
                        'al_general_test_grade' => $studentALData->al_general_test_grade,
                        'al_general_english_grade' => $studentALData->al_general_english_grade,
                        'al_sub1_grade' => $studentALData->al_sub1_grade,
                        'al_sub2_grade' => $studentALData->al_sub2_grade,
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
                        'ol_sub1_grade' => $studentOLData->ol_sub1_grade,
                        'ol_sub2_grade' => $studentOLData->ol_sub2_grade,
                        'ol_sub3_grade' => $studentOLData->ol_sub3_grade,
                        'ol_sub4_grade' => $studentOLData->ol_sub4_grade,
                        'ol_sub5_grade' => $studentOLData->ol_sub5_grade,
                        'ol_sub6_grade' => $studentOLData->ol_sub6_grade,
                        'ol_sub7_grade' => $studentOLData->ol_sub7_grade,
                        'ol_sub8_grade' => $studentOLData->ol_sub8_grade,
                        'ol_sub9_grade' => $studentOLData->ol_sub9_grade,

                        'al_school' => $studentALData->al_school,
                        'al_district' => $studentALData->al_district,
                        'stream' => $studentALData->stream,
                        'z_score' => $studentALData->z_score,
                        'al_general_test_grade' => $studentALData->al_general_test_grade,
                        'al_general_english_grade' => $studentALData->al_general_english_grade,
                        'al_sub1_grade' => $studentALData->al_sub1_grade,
                        'al_sub2_grade' => $studentALData->al_sub2_grade,
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
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'ol_school' => trim($_POST['ol_school']),
                    'ol_district' => trim($_POST['ol_district']),
                    'ol_sub1_grade' => trim($_POST['ol_sub1_grade']),
                    'ol_sub2_grade' => trim($_POST['ol_sub2_grade']),
                    'ol_sub3_grade' => trim($_POST['ol_sub3_grade']),
                    'ol_sub4_grade' => trim($_POST['ol_sub4_grade']),
                    'ol_sub5_grade' => trim($_POST['ol_sub5_grade']),
                    'ol_sub6_grade' => trim($_POST['ol_sub6_grade']),
                    'ol_sub7_grade' => trim($_POST['ol_sub7_grade']),
                    'ol_sub8_grade' => trim($_POST['ol_sub8_grade']),
                    'ol_sub9_grade' => trim($_POST['ol_sub9_grade']),

                    'ol_school_err' => '',
                    'ol_district_err' => '',
                    'ol_sub1_grade_err' => '',
                    'ol_sub2_grade_err' => '',
                    'ol_sub3_grade_err' => '',
                    'ol_sub4_grade_err' => '',
                    'ol_sub5_grade_err' => '',
                    'ol_sub6_grade_err' => '',
                    'ol_sub7_grade_err' => '',
                    'ol_sub8_grade_err' => '',
                    'ol_sub9_grade_err' => ''
                ];

                // Validate title
                if(empty($data['ol_school'])) {
                    $data['ol_school_err'] = 'Please enterol school name';
                }

                if(empty($data['ol_district'])) {
                    $data['ol_district_err'] = 'Please enter district';
                }

                if(empty($data['ol_sub1_grade'])) {
                    $data['ol_sub1_grade_err'] = 'Please enter subject 1';
                }

                if(empty($data['ol_sub2_grade'])) {
                    $data['ol_sub2_grade_err'] = 'Please enter subject 2';
                }

                if(empty($data['ol_sub3_grade'])) {
                    $data['ol_sub3_grade_err'] = 'Please enter subject 3';
                }

                if(empty($data['ol_sub4_grade'])) {
                    $data['ol_sub4_grade_err'] = 'Please enter subject 4';
                }

                if(empty($data['ol_sub5_grade'])) {
                    $data['ol_sub5_grade_err'] = 'Please enter subject 5';
                }

                if(empty($data['ol_sub6_grade'])) {
                    $data['ol_sub6_grade_err'] = 'Please enter subject 6';
                }

                if(empty($data['ol_sub7_grade'])) {
                    $data['ol_sub7_grade_err'] = 'Please enter subject 7';
                }

                if(empty($data['ol_sub8_grade'])) {
                    $data['ol_sub8_grade_err'] = 'Please enter subject 8';
                }

                if(empty($data['ol_sub9_grade'])) {
                    $data['ol_sub9_grade_err'] = 'Please enter subject 9';
                }

                // Make sure no errors
                if(empty($data['ol_school_err']) && empty($data['ol_district_err']) && empty($data['ol_sub1_grade_err']) && empty($data['ol_sub2_grade_err'])
                    && empty($data['ol_sub3_grade_err']) && empty($data['ol_sub4_grade_err']) && empty($data['ol_sub5_grade_err']) && empty($data['ol_sub6_grade_err'])
                    && empty($data['ol_sub7_grade_err']) && empty($data['ol_sub8_grade_err']) && empty($data['ol_sub9_grade_err'])) {
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
                    // Load view with errors
                    $this->view('students/settings/edit_settings_olqualified', $data);
                }
            }
            else {
                $id = $this->studentDashboardModel->findStudentIdbyEmail($_SESSION['user_email']);
                // Get existing post from model                
                $studentData = $this->studentDashboardModel->getStudentOLDetails($id);

                $data = [
                    'ol_school' => $studentData->ol_school,
                    'ol_district' => $studentData->ol_district,
                    'ol_sub1_grade' => $studentData->ol_sub1_grade,
                    'ol_sub2_grade' => $studentData->ol_sub2_grade,
                    'ol_sub3_grade' => $studentData->ol_sub3_grade,
                    'ol_sub4_grade' => $studentData->ol_sub4_grade,
                    'ol_sub5_grade' => $studentData->ol_sub5_grade,
                    'ol_sub6_grade' => $studentData->ol_sub6_grade,
                    'ol_sub7_grade' => $studentData->ol_sub7_grade,
                    'ol_sub8_grade' => $studentData->ol_sub8_grade,
                    'ol_sub9_grade' => $studentData->ol_sub9_grade,

                    'ol_school_err' => '',
                    'ol_district_err' => '',
                    'ol_sub1_grade_err' => '',
                    'ol_sub2_grade_err' => '',
                    'ol_sub3_grade_err' => '',
                    'ol_sub4_grade_err' => '',
                    'ol_sub5_grade_err' => '',
                    'ol_sub6_grade_err' => '',
                    'ol_sub7_grade_err' => '',
                    'ol_sub8_grade_err' => '',
                    'ol_sub9_grade_err' => ''
                ];
            }

            $this->view('students/settings/edit_settings_olqualified', $data);
        }

        public function editSettingsAL() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'al_school' => trim($_POST['al_school']),
                    'stream' => trim($_POST['stream']),
                    'z_score' => trim($_POST['z_score']),
                    'al_district' => trim($_POST['al_district']),
                    'al_general_test_grade' => trim($_POST['al_general_test_grade']),
                    'al_general_english_grade' => trim($_POST['al_general_english_grade']),
                    'al_sub1_grade' => trim($_POST['al_sub1_grade']),
                    'al_sub2_grade' => trim($_POST['al_sub2_grade']),
                    'al_sub3_grade' => trim($_POST['al_sub3_grade']),

                    'al_school_err' => '',
                    'stream_err' => '',
                    'z_score_err' => '',
                    'al_district_err' => '',
                    'al_general_test_grade_err' => '',
                    'al_general_english_grade_err' => '',
                    'al_sub1_grade_err' => '',
                    'al_sub2_grade_err' => '',
                    'al_sub3_grade_err' => ''
                ];

                // Validate
                if(empty($data['al_school'])) {
                    $data['al_school_err'] = 'Please enter AL school name';
                }

                if(empty($data['stream'])) {
                    $data['stream_err'] = 'Please enter stream';
                }

                if(empty($data['z_score'])) {
                    $data['z_score_err'] = 'Please enter z score';
                }

                if(empty($data['al_district'])) {
                    $data['al_district_err'] = 'Please enter district';
                }

                if(empty($data['al_general_test_grade'])) {
                    $data['al_general_test_grade_err'] = 'Please enter general test grade';
                }

                if(empty($data['al_general_english_grade'])) {
                    $data['al_general_english_grade_err'] = 'Please enter general english grade';
                }

                if(empty($data['al_sub1_grade'])) {
                    $data['al_sub1_grade_err'] = 'Please enter subject 1';
                }

                if(empty($data['al_sub2_grade'])) {
                    $data['al_sub2_grade_err'] = 'Please enter subject 2';
                }

                if(empty($data['al_sub3_grade'])) {
                    $data['al_sub3_grade_err'] = 'Please enter subject 3';
                }


                // Make sure no errors
                if(empty($data['al_school_err']) && empty($data['stream_err']) && empty($data['z_score_err']) && empty($data['al_district_err'])
                    && empty($data['al_general_test_grade_err']) && empty($data['al_general_english_grade_err']) && empty($data['al_sub1_grade_err'])
                    && empty($data['al_sub2_grade_err']) && empty($data['al_sub3_grade_err'])) {
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

                $data = [
                    'al_school' => $studentData->al_school,
                    'stream' => $studentData->stream,
                    'z_score' => $studentData->z_score,
                    'al_district' => $studentData->al_district,
                    'al_general_test_grade' => $studentData->al_general_test_grade,
                    'al_general_english_grade' => $studentData->al_general_english_grade,
                    'al_sub1_grade' => $studentData->al_sub1_grade,
                    'al_sub2_grade' => $studentData->al_sub2_grade,
                    'al_sub3_grade' => $studentData->al_sub3_grade,

                    'al_school_err' => '',
                    'stream_err' => '',
                    'z_score_err' => '',
                    'al_district_err' => '',
                    'al_general_test_grade_err' => '',
                    'al_general_english_grade_err' => '',
                    'al_sub1_grade_err' => '',
                    'al_sub2_grade_err' => '',
                    'al_sub3_grade_err' => ''
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