<?php
// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Préparation et exécution de la requête
$stmt = $pdo->prepare("SELECT nom, capacite_etage FROM salles");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacité des salles</title>
    <style>
        table {
            width: 50%;
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
    </style>
</head>
<body>
    <h1 style="text-align: center;">Liste des salles et leur capacité</h1>
    <table>
        <thead>
            <tr>
                <th>Nom de la salle</th>
                <th>Capacité</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($rows) {
                foreach ($rows as $row) {
                    echo "<tr><td>" . htmlspecialchars($row['nom']) . "</td><td>" . htmlspecialchars($row['capacite_etage']) . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Aucune salle trouvée</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
