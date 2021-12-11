<?php
    require APPROOT.'/libraries/FPDF/fpdf.php';

    class myPDF extends FPDF {
        function header() {
            $this->Image(URLROOT.'/imgs/components/sidebar/logo2.jpg', 10, 6);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(276, 5, 'Curriculum Vitae', 0, 0, 'C');
            $this->Ln();
            $this->SetFont('Times', '', 12);
            $this->Cell(276, 10, 'Some text', 0, 0, 'C');
            $this->Ln(20);
        }
    }

    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L', 'A4', 0);
    $pdf->Output();
?>