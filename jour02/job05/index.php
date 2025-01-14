<?php

for ($number = 2; $number <= 1000; $number++) {
    $isPrime = true; 

    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) { 
            $isPrime = false; 
            break; 
        }
    } if ($isPrime) {
        echo "$number<br>";
    }
}

?>