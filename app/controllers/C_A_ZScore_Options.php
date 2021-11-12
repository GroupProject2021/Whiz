<?php

class C_A_ZScore_Options extends Controller {
    public function __construct() {
        $this->zScoreModel = $this->model('M_A_ZScore_Options');
    }

    // view z-score
    public function viewZScoreTable() {
        $zscore_table_header = $this->zScoreModel->getZScoreTableHeader();
        $zscore_table = $this->zScoreModel->getZScoreTable();

        $data = [
            'zscore_table_header' => $zscore_table_header,
            'zscore_table' => $zscore_table
        ];
        
        $this->view('admin/opt_z_score_options/v_z_score_table', $data);
    }

    // add entry
    public function addZScoreEntry() {
        $course_university_list = $this->zScoreModel->getCourseAndUniversities();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [                
                'course_university_list' => $course_university_list,

                'course_of_study' => $_POST['course_of_study'],
                'year' => $_POST['year'],
                'syllabus' => $_POST['syllabus'],
                'd1' => $_POST['d1'],
                'd2' => $_POST['d2'],
                'd3' => $_POST['d3'],
                'd4' => $_POST['d4'],
                'd5' => $_POST['d5'],
                'd6' => $_POST['d6'],
                'd7' => $_POST['d7'],
                'd8' => $_POST['d8'],
                'd9' => $_POST['d9'],
                'd10' => $_POST['d10'],
                'd11' => $_POST['d11'],
                'd12' => $_POST['d12'],
                'd13' => $_POST['d13'],
                'd14' => $_POST['d14'],
                'd15' => $_POST['d15'],
                'd16' => $_POST['d16'],
                'd17' => $_POST['d17'],
                'd18' => $_POST['d18'],
                'd19' => $_POST['d19'],
                'd20' => $_POST['d20'],
                'd21' => $_POST['d21'],
                'd22' => $_POST['d22'],
                'd23' => $_POST['d23'],
                'd24' => $_POST['d24'],
                'd25' => $_POST['d25'],

                'd_err' => '',
            ];

            // Validate gender
            if(
                empty($data['d1']) || empty($data['d2']) || empty($data['d3']) || empty($data['d4']) || empty($data['d5']) ||
                empty($data['d6']) || empty($data['d7']) || empty($data['d8']) || empty($data['d9']) || empty($data['d10']) ||
                empty($data['d11']) || empty($data['d12']) || empty($data['d13']) || empty($data['d14']) || empty($data['d15']) ||
                empty($data['d16']) || empty($data['d17']) || empty($data['d18']) || empty($data['d19']) || empty($data['d20']) ||
                empty($data['d21']) || empty($data['d22']) || empty($data['d23']) || empty($data['d24']) || empty($data['d25'])
            ) {
                $data['d_err'] = 'Please fill all the records';
            }

            // Make sure no errors
            if(empty($data['d_err'])) {
                // Validated                    
                if($this->zScoreModel->addZScoreEntry($data)) {
                    flash('gov_uni_message', 'New record added');
                    
                    redirect('C_A_ZScore_Options/viewZScoreTable');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('admin/opt_z_score_options/add/v_add_s_score_record', $data);
            }
        }
        else {         
            $data = [                
                'course_university_list' => $course_university_list,

                'course_of_study' => '',
                'year' => '',
                'syllabus' => '',
                'd1' => '',
                'd2' => '',
                'd3' => '',
                'd4' => '',
                'd5' => '',
                'd6' => '',
                'd7' => '',
                'd8' => '',
                'd9' => '',
                'd10' => '',
                'd11' => '',
                'd12' => '',
                'd13' => '',
                'd14' => '',
                'd15' => '',
                'd16' => '',
                'd17' => '',
                'd18' => '',
                'd19' => '',
                'd20' => '',
                'd21' => '',
                'd22' => '',
                'd23' => '',
                'd24' => '',
                'd25' => '',

                'd_err' => '',
            ];
        }

        $this->view('admin/opt_z_score_options/add/v_add_s_score_record', $data);
    }
}

?>