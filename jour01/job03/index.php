<?php

$booleanVar = true;
$intVar = 42;
$stringVar = "Bonjour";
$floatVar = 3.14;


$variables = [
    ["type" => "boolean", "nom" => "booleanVar", "valeur" => $booleanVar ? "true" : "false"],
    ["type" => "integer", "nom" => "intVar", "valeur" => $intVar],
    ["type" => "string", "nom" => "stringVar", "valeur" => $stringVar],
    ["type" => "float", "nom" => "floatVar", "valeur" => $floatVar],
];

echo "<table border='1' style='border-collapse: collapse; width: 50%;'>";
echo "<thead>";
echo "<tr><th>Type</th><th>Nom</th><th>Valeur</th></tr>";
echo "</thead>";
echo "<tbody>";

foreach ($variables as $variable) {
    echo "<tr>";
    echo "<td>{$variable['type']}</td>";
    echo "<td>{$variable['nom']}</td>";
    echo "<td>{$variable['valeur']}</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>