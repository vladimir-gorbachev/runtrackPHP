<?php

$str = "Certaines choses changent, et d'autres ne changeront jamais.";

$length = strlen($str);


$new_str = " ";

for ($i = 0; $i < $length; $i++) {
    $next_char = ($i == $length - 1) ? $str[0] : $str[$i +1];
    $new_str .= $next_char;
}

echo $str;
echo "<br><br>";
echo $new_str;
?>
