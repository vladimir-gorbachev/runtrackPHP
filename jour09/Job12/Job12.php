<?php
$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", "root", "");

$query = "SELECT prénom, nom, naissance FROM étudiants WHERE naissance BETWEEN '1998-01-01' AND '2018-12-31'";
$result = $pdo->query($query);

echo "<table style='border: 1px solid black; border-collapse: collapse; width: 100%;'>";
echo "<thead><tr>";

$columns = array_keys($result->fetch(PDO::FETCH_ASSOC));
foreach ($columns as $column) {
    echo "<th style='border: 1px solid black; padding: 5px;'>$column</th>";
}

echo "</tr></thead><tbody>";

$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td style='border: 1px solid black; padding: 5px;'>$value</td>";
    }
    echo "</tr>";
}

echo "</tbody></table>";
?>