<?php

$str = "Les choses que l'on possède finissent par nous posséder.";

$reversedStr = strrev($str);

echo $reversedStr;
echo "<br><br>";


$length = mb_strlen($str, 'UTF-8');

$reversedStr = '';
for ($i = $length - 1; $i >= 0; $i--) {
    $reversedStr .= mb_substr($str, $i, 1, 'UTF-8');
}

echo $reversedStr;

?>
