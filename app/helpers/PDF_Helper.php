<?php
    function pdf_h1($pdf) {
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->SetTextColor(199, 133, 11);
    }

    function pdf_h2($pdf) {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetTextColor(163, 107, 2);
    }

    function pdf_h3($pdf) {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetTextColor(0, 0, 0);
    }

    function pdf_p($pdf) {
        $pdf->SetFont('Arial', '', 11);
        $pdf->SetTextColor(0, 0, 0);
    }

    function pdf_auto_wrap_p($pdf, $text) {
        $cellWidth = 90;    //wrapped cell width
        $cellHeight = 5;    //one-line height
        
        if($pdf->GetStringWidth($text) < $cellWidth) {
            $line = 1;
        }
        else {
            $textLength = strlen($text);
            $errMargin = 10;
            $startChar = 0;
            $maxChar = 0;
            $textArray = array();
            $tmpString = "";

            while($startChar < $textLength) {
                while($pdf->GetStringWidth($tmpString) < ($cellWidth-$errMargin) && ($startChar+$maxChar) < $textLength) {
                    $maxChar++;
                    $tmpString = substr($text, $startChar, $maxChar);
                }

                $startChar = $startChar+$maxChar;
                array_push($textArray, $tmpString);
                $maxChar = 0;
                $tmpString = '';
            }

            $line=count($textArray);
        }
        
        $xPos = $pdf->GetX();
        $yPos = $pdf->GetY();
        $pdf->MultiCell($cellWidth, $cellHeight, $text);
        $pdf->SetXY($xPos + $cellWidth, $yPos);
        // $pdf->Ln($line*$cellHeight);

        return $line*$cellHeight;
    }
?>