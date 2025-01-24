<?php 
// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Préparation et exécution de la requête pour récupérer le nombre d'étudiants
$stmt = $pdo->query("SELECT COUNT(*) AS nb_etudiants FROM étudiants");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre Total d'Étudiants</title>
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
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Nombre Total d'Étudiants</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre Total d'Étudiants</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= htmlspecialchars($row['nb_etudiants'] ?? 'Aucun étudiant trouvé') ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
