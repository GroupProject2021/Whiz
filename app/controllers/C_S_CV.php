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

        // EDUCATIONAL QUALIFICATIONS
        $pdf->Ln(10);        
        pdf_h1($pdf);        
        $pdf->Cell(100, 7, 'EDUCATIONAL QUALIFICATIONS', 0, 1);

        // Higher educational qualifications
        $uniData = $this->cvModel->getStudentUniversityDetails($id);
        pdf_h2($pdf);
        $pdf->Cell(90, 7, 'Higher education', 0, 1);
        pdf_p($pdf);
        $pdf->Cell(90, 6, $uniData->degree, 0, 1);
        $pdf->Cell(90, 6, $uniData->uni_name, 0, 1);
        $pdf->Cell(90, 6, 'GPA: '.$uniData->gpa, 0, 1);

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
        $pdf->Cell(20, 6, $studentALData->al_sub2_grade, 0, 1, 'C');
        $pdf->Cell(70, 6, $this->cvModel->getALSubjectName($studentALData->al_sub3_id), 0, 0);
        $pdf->Cell(20, 6, $studentALData->al_sub3_grade, 0, 1, 'C');

        // G.C.E(O/L)
        $studentOLData = $this->cvModel->getStudentOLDetails($id);
        $pdf->Ln(4);
        pdf_h2($pdf);
        $pdf->Cell(90, 7, 'G.C.E(O/L)', 0, 1);
        pdf_h3($pdf);
        $pdf->Cell(70, 6, 'School attended', 0, 0);
        $pdf->Cell(20, 6, 'District', 0, 1);        
        pdf_p($pdf);
        $pdf->Cell(70, 6, $studentOLData->ol_school, 0, 0);
        $pdf->Cell(20, 6, $studentOLData->ol_district, 0, 1);
        $pdf->Ln(1);
        pdf_h3($pdf);
        $pdf->Cell(90, 6, 'Results', 0, 1);
        pdf_p($pdf);
        $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub1_id), 0, 0,);
        $pdf->Cell(20, 6, $studentOLData->ol_sub1_grade, 0, 1, 'C');
        $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub2_id), 0, 0);
        $pdf->Cell(20, 6, $studentOLData->ol_sub2_grade, 0, 1, 'C');
        $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub3_id), 0, 0);
        $pdf->Cell(20, 6, $studentOLData->ol_sub3_grade, 0, 1, 'C');
        $pdf->Cell(70, 6, $this->cvModel->getOLSubjectName($studentOLData->ol_sub4_id), 0, 0);
        $pdf->Cell(20, 6, $studentOLData->ol_sub4_grade, 0, 1, 'C');
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

    // upload custom cv
    public function uploadCustomCV() {
        $this->view('students/opt_cv/v_custom_cv');
    }

    // edit
    public function editCV() {
        $this->view('students/opt_cv/v_edit_cv');
    }
}

?>