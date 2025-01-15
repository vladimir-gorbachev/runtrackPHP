<!-- Créez une string nommée str et affectez-y le texte “Tous ces instants
seront perdus dans le temps comme les larmes sous la pluie.” Parcourir
cette chaîne en affichant seulement un caractère sur deux. -->

<?php

$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

for ($i = 0; $i < strlen($str); $i += 2) {
    echo $str[$i];
}
echo "<br><br>";













// Parcourir cette chaîne en affichant seulement un MOT sur deux. -->

// Séparez la chaîne en mots
$words = explode(' ', $str);
// Parcourir le tableau des mots et afficher un mot sur deux
for ($i = 0; $i < count($words); $i += 2) {
    echo $words[$i] . " ";
}
?>