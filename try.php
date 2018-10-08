<?php
$fromtimearray = array();
$totimearray = array();

array_push($fromtimearray, 1);
array_push($totimearray, 5);

array_push($fromtimearray, 6);
array_push($totimearray, 7);

$fromtimearraycount = count($fromtimearray);
$totimearraycount = count($totimearray);

for($i = 1; $i < 15; $i++) {
    if($i == 1) {
        if(!in_array(1, $fromtimearray) && !in_array(1, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(1 >= $fromtimearray[$ii] && 1 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="1">06:00 am</option><br>';
            }
        }
    } else if($i == 2) {
        if(!in_array(2, $fromtimearray) && !in_array(2, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(2 >= $fromtimearray[$ii] && 2 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="2">07:00 am</option><br>';
            }
        }
    } else if($i == 3) {
        if(!in_array(3, $fromtimearray) && !in_array(3, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(3 >= $fromtimearray[$ii] && 3 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="3">08:00 am</option><br>';
            }
        }
    } else if($i == 4) {
        if(!in_array(4, $fromtimearray) && !in_array(4, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(4 >= $fromtimearray[$ii] && 4 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="4">09:00 am</option><br>';
            }
        }
    } else if($i == 5) {
        if(!in_array(5, $fromtimearray) && !in_array(5, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(5 >= $fromtimearray[$ii] && 5 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="5">10:00 am</option><br>';
            }
        }
    } else if($i == 6) {
        if(!in_array(6, $fromtimearray) && !in_array(6, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(6 >= $fromtimearray[$ii] && 6 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="6">11:00 am</option><br>';
            }
        }
    } else if($i == 7) {
        if(!in_array(7, $fromtimearray) && !in_array(7, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(7 >= $fromtimearray[$ii] && 7 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="7">12:00 pm</option><br>';
            }
        }
    } else if($i == 8) {
        if(!in_array(8, $fromtimearray) && !in_array(8, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(8 >= $fromtimearray[$ii] && 8 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="8">01:00 pm</option><br>';
            }
        }
    } else if($i == 9) {
        if(!in_array(9, $fromtimearray) && !in_array(9, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(9 >= $fromtimearray[$ii] && 9 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="9">02:00 pm</option><br>';
            }
        }
    } else if($i == 10) {
        if(!in_array(10, $fromtimearray) && !in_array(10, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(10 >= $fromtimearray[$ii] && 10 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="10">03:00 pm</option><br>';
            }
        }
    } else if($i == 11) {
        if(!in_array(11, $fromtimearray) && !in_array(11, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(11 >= $fromtimearray[$ii] && 11 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="11">04:00 pm</option><br>';
            }
        }
    } else if($i == 12) {
        if(!in_array(12, $fromtimearray) && !in_array(12, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(12 >= $fromtimearray[$ii] && 12 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="12">05:00 pm</option><br>';
            }
        }
    } else if($i == 13) {
        if(!in_array(13, $fromtimearray) && !in_array(13, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(13 >= $fromtimearray[$ii] && 13 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="13">06:00 pm</option><br>';
            }
        }
    } else if($i == 14) {
        if(!in_array(14, $fromtimearray) && !in_array(14, $totimearray)) {
            $rangestatus = 0;
            for($ii = 0; $ii < $fromtimearraycount; $ii++) {
                if(14 >= $fromtimearray[$ii] && 14 <= $totimearray[$ii]) {
                    $rangestatus = 1;
                }
            }
            if($rangestatus == 0) {
                echo '<option value="14">07:00 pm</option>';
            }
        }
    }
}

?>
