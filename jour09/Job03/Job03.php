<?php
// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Préparation et exécution de la requête pour récupérer les étudiantes
$stmt = $pdo->prepare("SELECT prénom, nom, naissance FROM étudiants WHERE sexe = 'Femme'");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiantes</title>
    <style>
        table {
            width: 60%;
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
    <h1>Liste des étudiantes</h1>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date de Naissance</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($rows) {
                foreach ($rows as $row) {
                    echo "<tr><td>" . htmlspecialchars($row['prénom']) . "</td><td>" . htmlspecialchars($row['nom']) . "</td><td>" . htmlspecialchars($row['naissance']) . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Aucune étudiante trouvée</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
