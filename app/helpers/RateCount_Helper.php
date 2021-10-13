<?php
    function countRate($total_reviews, $rate1, $rate2, $rate3, $rate4, $rate5) {

        if($total_reviews) {

            $avgRate = ((1*$rate1) + (2*$rate2) + (3*$rate3) + (4*$rate4) + (5*$rate5)) / $total_reviews;
        }
        else {
            $avgRate = 0;
        }
        
        $avgRate = number_format((float)$avgRate, 1, '.', '');

        return $avgRate;
    }
?>