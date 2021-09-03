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
    }
?>