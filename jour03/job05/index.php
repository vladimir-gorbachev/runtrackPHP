<?php

$str = "On n est pas le meilleur quand on le croit mais quand on le sait";

$voyelles = "aeiouyAEIOUY";
$consonnes = "bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ"; 

$nombre_voyelles = 0;
$nombre_consonnes = 0;

$i = 0;
$longueur_str = strlen($str);

while ($i < $longueur_str) {

    $caractere = $str[$i];
    
    if (strpos($voyelles, $caractere) !== false) {
        $nombre_voyelles++;
    }

    elseif (strpos($consonnes, $caractere) !== false) {
        $nombre_consonnes++;
    }

    $i++;
}

echo "<table border='1' style='padding: 20px; width:90%; height:90%; align-self:center; text-align:center;'>";
echo "<thead><tr><th>$str</th></tr></tbody>";
echo "<thead><tr><th>Voyelles</th><th>Consonnes</th></tr></thead>";
echo "<tbody><tr><td>$nombre_voyelles</td><td>$nombre_consonnes</td></tr></tbody>";
echo "</table>";

?>