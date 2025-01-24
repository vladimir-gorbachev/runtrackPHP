<?php
// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Récupération des données
$rows = $pdo->query("SELECT * FROM étudiants")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des étudiants</title>
    <style>
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 10px; text-align: center; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Liste des étudiants</h1>
    <table>
        <thead>
            <tr><th>Id</th><th>Prénom</th><th>Nom</th><th>Date de naissance</th><th>Sexe</th><th>Email</th></tr>
        </thead>
        <tbody>
            <?php 
            if ($rows) {
                foreach ($rows as $row) {
                    echo "<tr>";
                    foreach (['ID', 'prénom', 'nom', 'naissance', 'sexe', 'email'] as $key) {
                        echo "<td>" . htmlspecialchars($row[$key]) . "</td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Aucun étudiant trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
