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
                        'district' => $studentOLData->district,
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
                        'district' => $studentOLData->district,
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
                        'district' => $studentALData->district,
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
                        'district' => $studentOLData->district,
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
                        'district' => $studentALData->district,
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
    }
?>