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

    function pdf_p_no($pdf) {
        $pdf->SetFont('Arial', 'B', 11);
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

    function pdf_barchart($pdf, $x, $y, $values) {
        // draw position
        $chartX = $x;
        $chartY = $y;

        $chartWidth = 90;
        $chartHeight = 70;

        $chartTopPadding = 10;
        $chartLeftPadding = 10;
        $chartBottomPadding = 10;
        $chartRightPadding = 10;

        $chartBoxX = $chartX + $chartLeftPadding;
        $chartBoxY = $chartY + $chartTopPadding;
        $chartBoxWidth = $chartWidth - $chartLeftPadding - $chartRightPadding;
        $chartBoxHeight = $chartHeight - $chartTopPadding - $chartBottomPadding;

        $barWidth = 10;
        $data = Array (
            'SKILL 1' => [
                'color' => [211, 139, 5],
                'value' => $values['skill1']
            ],
            'SKILL 2' => [
                'color' => [218, 153, 33],
                'value' => $values['skill2']
            ],
            'SKILL 3' => [
                'color' => [219, 164, 63],
                'value' => $values['skill3']
            ],
            'SKILL 4' => [
                'color' => [224, 179, 94],
                'value' => $values['skill4']
            ]
        );

        $dataMax = 100;
        foreach($data as $item) {
            if($item['value'] > $dataMax)
                $dataMax = $item['value'];
        }

        $dataStep = 10;

        $pdf->SetFont('Arial', '', 9);
        $pdf->SetLineWidth(0.2);
        $pdf->SetDrawColor(0);

        // chart border
        // $pdf->Rect($chartX, $chartY, $chartWidth, $chartHeight);

        $pdf->Line(
            $chartBoxX,
            $chartBoxY,
            $chartBoxX,
            $chartBoxY + $chartBoxHeight
        );

        $pdf->Line(
            $chartBoxX - 2,
            $chartBoxY + $chartBoxHeight,
            $chartBoxX + $chartBoxWidth,
            $chartBoxY + $chartBoxHeight
        );

        // vertical axis - y
        $yAxisUnits = $chartBoxHeight / $dataMax;

        for($i = 0; $i < $dataMax; $i += $dataStep) {
            $yAxisPos = $chartBoxY + ($yAxisUnits * $i);

            $pdf->Line(
                $chartBoxX - 2,
                $yAxisPos,
                $chartBoxX,
                $yAxisPos
            );

            $pdf->SetXY($chartBoxX - $chartLeftPadding, $yAxisPos - 2);
            $pdf->Cell($chartLeftPadding - 4, 5, $dataMax - $i, 0, 0, 'R');
        }

        // horizaontal axis - x
        $pdf->SetXY($chartBoxX, $chartBoxY + $chartBoxHeight);
        
        // cells width
        $xLabelWidth = $chartBoxWidth / count($data);

        $barXPos = 0;

        foreach($data as $itemName => $item) {
            $pdf->Cell($xLabelWidth, 5, $itemName, 0, 0, 'C');

            // bar color
            $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);

            // bar height
            $barHeight = $yAxisUnits * $item['value'];
            // bar x position
            $barX = ($xLabelWidth / 2) + ($xLabelWidth * $barXPos);
            $barX = $barX - ($barWidth / 2);
            $barX = $barX + $chartBoxX;
            // bar y position
            $barY = $chartBoxHeight - $barHeight;
            $barY = $barY + $chartBoxY;
            // draw the bar
            $pdf->Rect($barX, $barY, $barWidth, $barHeight, 'DF');

            // increment barXPos
            $barXPos++;
        }
    }

    function pdf_barchart_footer($pdf) {
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(94, 61, 0);
    }
?>