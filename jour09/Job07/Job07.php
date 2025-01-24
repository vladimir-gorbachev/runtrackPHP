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

// Requête SQL pour calculer la superficie totale des étages
$sql = "SELECT SUM(superficie) AS superficie_totale FROM étage";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superficie Totale des Étages</title>
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
    <h1>Superficie Totale des Étages</h1>
    <table>
        <thead>
            <tr>
                <th>Superficie Totale</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Vérification si des résultats sont disponibles
            if ($result->num_rows > 0) {
                // Récupérer et afficher la superficie totale
                $row = $result->fetch_assoc();
                echo "<tr><td>" . htmlspecialchars($row['superficie_totale']) . " m²</td></tr>";
            } else {
                // Si aucun résultat n'est trouvé
                echo "<tr><td>Aucune donnée disponible</td></tr>";
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
