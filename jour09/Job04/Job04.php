<?php
// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Préparation et exécution de la requête pour récupérer les étudiants dont le prénom commence par "T"
$stmt = $pdo->prepare("SELECT * FROM étudiants WHERE prénom LIKE 'T%'");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les noms des colonnes
$columns = array_keys($rows[0]); // Si des résultats existent, on prend les clés de la première ligne pour les noms de colonnes
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiants dont le prénom commence par T</title>
    <style>
        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Étudiants dont le prénom commence par "T"</h1>
    <table>
        <thead>
            <tr>
                <?php foreach ($columns as $column): ?>
                    <th><?= htmlspecialchars(ucwords($column)) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        
        <tbody>
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($row as $value) echo "<td>" . htmlspecialchars($value) . "</td>"; ?>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="<?= count($columns) ?>">Aucun étudiant trouvé</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
