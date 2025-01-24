<?php
$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", 'root', '');
$query = "SELECT * FROM salles ORDER BY capacite_etage DESC";
$salles = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salles Triées par Capacité</title>
    <style>
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 10px; text-align: center; }
        th { background-color: #f4f4f4; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Salles Triées par Capacité (Décroissante)</h1>
    <table>
        <thead>
            <tr><?php foreach (array_keys($salles[0]) as $col): ?><th><?= htmlspecialchars($col) ?></th><?php endforeach; ?></tr>
        </thead>
        <tbody>
            <?php foreach ($salles as $salle): ?>
                <tr><?php foreach ($salle as $value): ?><td><?= htmlspecialchars($value) ?></td><?php endforeach; ?></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
