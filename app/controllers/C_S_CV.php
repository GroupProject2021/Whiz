<?php
require APPROOT.'/libraries/FPDF/fpdf.php';

class C_S_CV extends Controller {
    public function __construct() {
        $this->cvModel = $this->model('M_S_CV');
    }

    // Index
    public function index() {
        $this->view('students/opt_cv/v_cv');
    }

    // generate cv
    public function generateCV() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'skill1' => trim($_POST['skill1']),
                'skill2' => trim($_POST['skill2']),
                'skill3' => trim($_POST['skill3']),
                'skill4' => trim($_POST['skill4']),

                'skill1_value' => trim($_POST['skill1_value']),
                'skill2_value' => trim($_POST['skill2_value']),
                'skill3_value' => trim($_POST['skill3_value']),
                'skill4_value' => trim($_POST['skill4_value']), 

                'overall_score'=> ($_POST['skill1_value']+$_POST['skill2_value']+$_POST['skill3_value']+$_POST['skill4_value'])/4,

                'exp_have' => $_POST['exp_have'],

                'exp1_job' => trim($_POST['exp1_job']),
                'exp1_com' => trim($_POST['exp1_com']),
                'exp1_year' => trim($_POST['exp1_year']),

                'exp2_job' => trim($_POST['exp2_job']),
                'exp2_com' => trim($_POST['exp2_com']),
                'exp2_year' => trim($_POST['exp2_year'])
            ];

            $id = $_SESSION['user_id'];
            //$this->view('students/opt_cv/v_generate_cv');

            $pdf = new FPDF();

            $pdf->AddPage();
            //Cell(width, height, text, border, newline, text align)

            // Student details
            $studentData = $this->cvModel->getStudentDetails($id);        
            $pdf->Image(URLROOT.'/profileimages/'.getActorTypeForIcons($_SESSION['actor_type']).'/'.$_SESSION['user_profile_image'], 5, 5, 35, 35);
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(40, 7, '', 0, 0);
            $pdf->Cell(90, 7, 'CURICULUM VITAE', 0, 1);
            $pdf->Ln(5);    
            $pdf->SetFont('Arial', 'B', 22);
            $pdf->Cell(40, 7, '', 0, 0);
            $pdf->Cell(90, 7, $studentData->first_name.' '.$studentData->last_name, 0, 1);
            $pdf->SetFont('Arial', '', 13);
            $pdf->Cell(40, 7, '', 0, 0);
            $pdf->Cell(90, 7, 'Undergraduate', 0, 1);

            // PROFILE
            $pdf->Ln(10);        
            pdf_h1($pdf);        
            $pdf->Cell(90, 7, 'PROFILE', 0, 0);
                        $pdf->Cell(10, 5, '', 0, 0);
                        $pdf->Cell(90, 7, 'CONTACT', 0, 1);
                        pdf_p($pdf);
            $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, impedit? Obcaecati ducimus, alias minima sunt dolore quod ut iste distinctio? Inventore obcaecati incidunt perspiciatis expedita corrupti id, blanditiis rerum dolores!';
            $lines = pdf_auto_wrap_p($pdf, $text);
                        $pdf->Cell(17, 6, '', 0, 0);
                        $pdf->Image( URLROOT.'/imgs/profiles/student/phnno-icon.png', 111, 53, 5, 5);
                        $pdf->Cell(90, 6, $studentData->phn_no, 0, 1);
                        $pdf->Cell(107, 6, '', 0, 0);
                        $pdf->Image(URLROOT.'/imgs/profiles/student/email-icon.png', 111, 60, 5, 5);
                        $pdf->Cell(90, 7, $studentData->email, 0, 1);
                        $pdf->Cell(107, 7, '', 0, 0);
                        $pdf->Image(URLROOT.'/imgs/profiles/student/address-icon.png', 111, 67, 5, 5);
                        $pdf->Cell(90, 7, $studentData->address, 0, 0);
                        $pdf->Ln($lines - 3*5);

            // EDUCATIONAL QUALIFICATIONS + SKILLS
            $pdf->Ln(5);        
            pdf_h1($pdf);        
            $pdf->Cell(100, 7, 'EDUCATIONAL QUALIFICATIONS', 0, 0);

                        $pdf->Cell(100, 7, 'SKILLS', 0, 1);

            $uniData = $this->cvModel->getStudentUniversityDetails($id);
            pdf_h2($pdf);
            $pdf->Cell(90, 7, 'Higher education', 0, 0);
                        $pdf->Cell(10, 5, '', 0, 0);            
                        pdf_p_no($pdf);
                        $pdf->Cell(5, 7, '1. ', 0, 0);
                        pdf_p($pdf);
                        $pdf->Cell(100, 7, $data['skill1'], 0, 1);
                        pdf_p($pdf);
            $pdf->Cell(90, 6, $uniData->degree, 0, 0);
                        $pdf->Cell(10, 5, '', 0, 0);            
                        pdf_p_no($pdf);
                        $pdf->Cell(5, 7, '2. ', 0, 0);
                        pdf_p($pdf);
                        $pdf->Cell(100, 7, $data['skill2'], 0, 1);
                        pdf_p($pdf);
            $pdf->Cell(90, 6, $uniData->uni_name, 0, 0);
                        $pdf->Cell(10, 5, '', 0, 0);            
                        pdf_p_no($pdf);
                        $pdf->Cell(5, 7, '3. ', 0, 0);
                        pdf_p($pdf);
                        $pdf->Cell(100, 7, $data['skill3'], 0, 1);
                        pdf_p($pdf);
            $pdf->Cell(90, 6, 'GPA: '.$uniData->gpa, 0, 0);
                        $pdf->Cell(10, 5, '', 0, 0);            
                        pdf_p_no($pdf);
                        $pdf->Cell(5, 7, '4. ', 0, 0);
                        pdf_p($pdf);
                        $pdf->Cell(100, 7, $data['skill4'], 0, 1);

            
            
            // G.C.E(A/L)
            $studentALData = $this->cvModel->getStudentALDetails($id);
            $pdf->Ln(4);
            pdf_h2($pdf);
            $pdf->Cell(90, 7, 'G.C.E(A/L)', 0, 1);
            pdf_h3($pdf);
            $pdf->Cell(70, 6, 'School attended', 0, 0);
            $pdf->Cell(20, 6, 'District', 0, 1);        
            pdf_p($pdf);
            $pdf->Cell(70, 6, $studentALData->al_school, 0, 0);
            $pdf->Cell(20, 6, $studentALData->al_district, 0, 1);
            $pdf->Ln(1);
            pdf_h3($pdf);
            $pdf->Cell(70, 6, 'Stream', 0, 0);
            $pdf->Cell(20, 6, 'Z-Score', 0, 1);    
            pdf_p($pdf);
            $pdf->Cell(70, 6, $this->cvModel->getStreamNameById($studentALData->stream), 0, 0);
            $pdf->Cell(20, 6, $studentALData->z_score, 0, 1);
            $pdf->Ln(1);
            pdf_h3($pdf);
            $pdf->Cell(90, 6, 'Results', 0, 1);
            pdf_p($pdf);
            $pdf->Cell(70, 6, 'General test', 0, 0);
            $pdf->Cell(20, 6, $studentALData->al_general_test_grade, 0, 1, 'C');
            $pdf->Cell(70, 6, 'General English', 0, 0);
            $pdf->Cell(20, 6, $studentALData->al_general_english_grade, 0, 1, 'C');
            $pdf->Cell(70, 6, $this->cvModel->getALSubjectName($studentALData->al_sub1_id), 0, 0);
            $pdf->Cell(20, 6, $studentALData->al_sub1_grade, 0, 1, 'C');
            $pdf->Cell(70, 6, $this->cvModel->getALSubjectName($studentALData->al_sub2_id), 0, 0);
            $pdf->Cell(20, 6, $studentALData->al_sub2_grade, 0, 0, 'C');
                        pdf_barchart_footer($pdf);
                        $pdf->Cell(10, 5, '', 0, 0);   
                        $pdf->Cell(90, 6, 'OVERALL SKILL SCORE', 0, 1, 'C');
                        pdf_p($pdf);
            $pdf->Cell(70, 6, $this->cvModel->getALSubjectName($studentALData->al_sub3_id), 0, 0);
            $pdf->Cell(20, 6, $studentALData->al_sub3_grade, 0, 0, 'C');
                        pdf_barchart_footer($pdf);
                        $pdf->Cell(10, 5, '', 0, 0);   
                        $pdf->Cell(90, 6, $data['overall_score'], 0, 1, 'C');

                        pdf_p($pdf);
                        $values = Array (
                            'skill1' => $data['skill1_value'],
                            'skill2' => $data['skill2_value'],
                            'skill3' => $data['skill3_value'],
                            'skill4' => $data['skill4_value']
                        );
                        pdf_barchart($pdf, 112, 110, $values);
                        $pdf->Ln(20);

            // G.C.E(O/L)
            $studentOLData = $this->cvModel->getStudentOLDetails($id);
            $pdf->Ln(4);
            pdf_h2($pdf);
            $pdf->Cell(90, 7, 'G.C.E(O/L)', 0, 0);
                        if($data['exp_have'] == "Yes") {
                        pdf_h1($pdf);
                        $pdf->Cell(10, 5, '', 0, 0);   
                        $pdf->Cell(90, 7, 'EXPEREINCE', 0, 1);
                        }
                        else {
                            $pdf->Ln();
                        }
            pdf_h3($pdf);
            $pdf->Cell(70, 6, 'School attended', 0, 0);
            $pdf->Cell(20, 6, 'District', 0, 0);       
                        if($data['exp_have'] == "Yes") {
                        pdf_h3($pdf);
                        $pdf->Cell(10, 5, '', 0, 0);  
                        $pdf->Cell(70, 6, $data['exp1_job'], 0, 1);                        
                        }
                        else {
                            $pdf->Ln();
                        }
            pdf_p($pdf);
            $pdf->Cell(70, 6, $studentOLData->ol_school, 0, 0);
            $pdf->Cell(20, 6, $studentOLData->ol_district, 0, 0);       
                        if($data['exp_have'] == "Yes") {
                        pdf_p($pdf);
                        $pdf->Cell(10, 5, '', 0, 0);   
                        $pdf->Cell(70, 6, $data['exp1_com'], 0, 1);
                        }
                        else {
                            $pdf->Ln();
                        }
            // $pdf->Ln(1);
            pdf_h3($pdf);
            $pdf->Cell(90, 6, 'Results', 0, 0);
                        if($data['exp_have'] == "Yes") {
                        pdf_p($pdf);
                        $pdf->Cell(10, 5, '', 0, 0);   
                        $pdf->Cell(70, 6, $data['exp1_year'], 0, 1);
                        }
                        else {
                            $pdf->Ln();
                        }
            pdf_p($pdf);
            $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub1_id), 0, 0,);
            $pdf->Cell(20, 6, $studentOLData->ol_sub1_grade, 0, 1, 'C');
            $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub2_id), 0, 0);
            $pdf->Cell(20, 6, $studentOLData->ol_sub2_grade, 0, 0, 'C');   
                        if($data['exp_have'] == "Yes") {
                        pdf_h3($pdf);
                        $pdf->Cell(10, 5, '', 0, 0);   
                        $pdf->Cell(70, 6, $data['exp2_job'], 0, 1);
                        }
                        else {
                            $pdf->Ln();
                        }
            pdf_p($pdf);
            $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub3_id), 0, 0);
            $pdf->Cell(20, 6, $studentOLData->ol_sub3_grade, 0, 0, 'C');
                        if($data['exp_have'] == "Yes") {
                        pdf_p($pdf);
                        $pdf->Cell(10, 5, '', 0, 0);   
                        $pdf->Cell(70, 6, $data['exp2_com'], 0, 1);
                        }
                        else {
                            $pdf->Ln();
                        }
            $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub4_id), 0, 0);
            $pdf->Cell(20, 6, $studentOLData->ol_sub4_grade, 0, 0, 'C');
                        if($data['exp_have'] == "Yes") {
                        pdf_p($pdf);
                        $pdf->Cell(10, 5, '', 0, 0);   
                        $pdf->Cell(70, 6, $data['exp2_year'], 0, 1);
                        }
                        else {
                            $pdf->Ln();
                        }
            $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub5_id), 0, 0);
            $pdf->Cell(20, 6, $studentOLData->ol_sub5_grade, 0, 1, 'C');
            $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub6_id), 0, 0);
            $pdf->Cell(20, 6, $studentOLData->ol_sub6_grade, 0, 1, 'C');
            $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub7_id), 0, 0);
            $pdf->Cell(20, 6, $studentOLData->ol_sub7_grade, 0, 1, 'C');
            $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub8_id), 0, 0);
            $pdf->Cell(20, 6, $studentOLData->ol_sub8_grade, 0, 1, 'C');
            $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub9_id), 0, 0);
            $pdf->Cell(20, 6, $studentOLData->ol_sub9_grade, 0, 1, 'C');

            

            $pdf->Output();
        }
    }

    // upload custom cv
    public function uploadCustomCV() {
        $fileName = $this->cvModel->isCVFileExists($_SESSION['user_id']);

        if($fileName != NULL) {
            $isCVFileExists = true;
        }
        else {
            $isCVFileExists = false;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'file' => $_FILES['file_to_be_upload'],
                'file_name' => time().'_'.$_FILES['file_to_be_upload']['name'],
                'is_cv_file_exists' => $isCVFileExists,

                'file_err' => ''
            ];

            // validate and upload profile image
            // if(uploadFile($data['file']['tmp_name'], $data['file_name'], '/files/CVs/')) {
            //     flash('file_upload', 'File uploaded successfully');
            // }
            // else {
            //     // upload unsuccessfull
            //     $data['file_err'] = 'File uploading unsuccessful';
            // }

            // validate and upload file
            if($data['file']['name'] == null) {
                if($fileName != null) {
                    $data['file_name'] = $fileName;
                }
            }
            elseif($data['file_name'] != $fileName) {
                if($fileName != null) {
                    if(updateFile(PUBROOT.'/files/CVs/'.$fileName, $data['file']['tmp_name'], $data['file_name'], '/files/CVs/')) {
                        flash('file_upload', 'File updated successfully');
                        $this->cvModel->updateCV($data);
                    }
                    else {
                        // upload unsuccessfull
                        $data['file_err'] = 'File uploading unsuccessful';
                    }
                }
                else{
                    if(uploadFile($data['file']['tmp_name'], $data['file_name'], '/files/CVs/')) {
                        flash('file_upload', 'File uploaded successfully');
                        $this->cvModel->addCV($data);
                    }
                    else {
                        // upload unsuccessfull
                        $data['file_err'] = 'File uploading unsuccessful';
                    }
                }
            }
            

            if(empty($data['file_err'])) {
                redirect('C_S_CV/index');
            }
            else {
                $this->view('students/opt_cv/v_custom_cv', $data);
            }
        }
        else {
            $data = [
                'file' => '',
                'file_name' => $fileName,
                'is_cv_file_exists' => $isCVFileExists,

                'file_err' => ''
            ];

            $this->view('students/opt_cv/v_custom_cv', $data);
        }
    }

    // edit
    public function editCV() {
        $this->view('students/opt_cv/v_edit_cv');
    }
}

?>