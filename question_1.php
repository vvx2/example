<?php

$number = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 3, 1, 2, 3, 56, 6);

foreach ($number as $number) {

    if ($number == 9) {
        break;
    } else if ($number % 2 == 0) {
        echo "Even <br>";
    } else {
        echo $number . "<br>";
    }
}
