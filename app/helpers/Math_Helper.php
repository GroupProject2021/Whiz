<?php
    function getPercentageRounded($current, $total, $precision) {
        if($total != 0) {
            $temp = ($current / $total) * 100;
            $temp = round($temp, $precision);

            return $temp;
        }
        else {
            return 0;
        }
    }
?>