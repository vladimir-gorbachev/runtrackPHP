<?php
// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Préparation et exécution de la requête pour récupérer les étudiants de moins de 18 ans
$stmt = $pdo->prepare("SELECT * FROM étudiants WHERE TIMESTAMPDIFF(YEAR, naissance, CURDATE()) < 18");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les colonnes (clés) pour l'en-tête
$columns = array_keys($rows[0] ?? []); // Si des résultats existent, on récupère les clés de la première ligne
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiants de moins de 18 ans</title>
    <style>
        table {
            width: 80%;
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
    <h1>Étudiants de moins de 18 ans</h1>
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
                    <?php foreach ($row as $value): ?>
                        <td><?= htmlspecialchars($value) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="<?= count($columns) ?>">Aucun étudiant trouvé</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
