<?php

$str = "I'm sorry Dave I'm afraid I can't do that";

$vowels = ['a', 'e', 'i', 'o', 'u','y','A', 'E', 'I', 'O', 'U','Y'];

$i = 0;


while ($i < strlen($str)) {
    if (
        $str[$i] == 'a' || $str[$i] == 'e' || $str[$i] == 'i' || 
        $str[$i] == 'o' || $str[$i] == 'u' || $str[$i] == 'y' || 
        $str[$i] == 'A' || $str[$i] == 'E' || $str[$i] == 'i' || 
        $str[$i] == 'o' || $str[$i] == 'u' || $str[$i] == 'y'
    ) {
        echo $str[$i];
    }
    $i++;
}

?>