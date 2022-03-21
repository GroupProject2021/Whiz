<?php
    function getPercentageRounded($current, $total, $precision) {
        $temp = ($current / $total) * 100;
        $temp = round($temp, $precision);

        return $temp;
    }
?>