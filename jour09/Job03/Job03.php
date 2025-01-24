<?php
// Connexion à la base de données
$host = 'localhost'; // Hôte
$username = 'root';  // Nom d'utilisateur
$password = '';      // Mot de passe
$database = 'jour08'; // Nom de la base de données

// Création de la connexion
$conn = new mysqli($host, $username, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Requête SQL pour récupérer les étudiantes
$sql = "SELECT prénom, nom, naissance FROM étudiants WHERE sexe = 'Femme'";
$result = $conn->query($sql);
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
            // Vérification si des résultats sont disponibles
            if ($result->num_rows > 0) {
                // Parcourir et afficher chaque ligne de résultats
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['prénom']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['naissance']) . "</td>";
                    echo "</tr>";
                }
            } else {
                // Si aucun résultat n'est trouvé
                echo "<tr><td colspan='3'>Aucune étudiante trouvée</td></tr>";
            }
            // Libérer les résultats
            $result->free();
            // Fermer la connexion
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
