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

// Requête SQL pour récupérer les salles triées par capacité décroissante
$sql = "SELECT * FROM salles ORDER BY capacite_etage DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salles Triées par Capacité</title>
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
    <h1>Salles Triées par Capacité (Décroissante)</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Étage</th>
                <th>Capacité</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Vérification si des résultats sont disponibles
            if ($result->num_rows > 0) {
                // Boucle pour afficher chaque ligne de la table salles
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['id_etage']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['capacite_etage']) . "</td>";
                    echo "</tr>";
                }
            } else {
                // Si aucun résultat n'est trouvé
                echo "<tr><td colspan='4'>Aucune salle trouvée</td></tr>";
            }
            // Libérer les résultats et fermer la connexion
            $result->free();
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
