<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test des paramètres GET</title>
</head>
<body>
    <h1>Test des paramètres GET</h1>

    <!-- Formulaire pour envoyer des données via GET -->
    <form action="index.php" method="get">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom"><br><br>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom"><br><br>
        <label for="age">Âge :</label>
        <input type="number" id="age" name="âge"><br><br>
        <button type="submit">Envoyer</button>
    </form>

    <?php
    // Vérifie si des paramètres GET ont été envoyés
    if (!empty($_GET)) {
        // Affiche le nombre d'arguments dans $_GET
        echo "<p>Nombre d'arguments reçus : " . count($_GET) . "</p>";
        
        // Affiche les clés et valeurs de chaque argument
        foreach ($_GET as $key => $value) {
            echo htmlspecialchars($key) . " : " . htmlspecialchars($value) . "<br>";
        }
    } else {
        echo "<p>Aucun argument reçu.</p>";
    }
    ?>
</body>
</html>
