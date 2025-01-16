<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test des paramètres POST</title>
    <style>
        /* Styles basiques pour le centrage et la présentation */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        form {
            margin: 20px auto;
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input, button {
            margin: 10px 0;
            width: 100%;
        }

        input, button {
            padding: 8px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: rgb(242, 255, 156);
        }
    </style>
</head>
<body>
    <h1>Test des paramètres POST</h1>

    <!-- Formulaire pour envoyer des données via POST -->
    <form action="" method="post">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom">
        
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
        
        <label for="age">Âge :</label>
        <input type="number" id="age" name="age">

        <button type="submit">Envoyer</button>
    </form>

    <?php
    // Vérifie si des paramètres POST ont été envoyés
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Filtrer les champs avec les valeurs non vides
        $filteredPost = array_filter($_POST, function($value) {
            return $value !== ""; // Exclure les champs vides
        });

        // Compter le nombre d'arguments dans $_POST
        $nbArguments = count($filteredPost);

        // Afficher le nombre d'arguments et les valeurs dans un tableau HTML
        if ($nbArguments > 0) {
            echo "<p>Nombre d'arguments reçus : " . $nbArguments . "</p>";

            echo "<table>";
            echo "<thead><tr><th>Argument</th><th>Valeur</th></tr></thead>";
            echo "<tbody>";

            // Parcourir les arguments et les afficher dans un tableau
            foreach ($filteredPost as $key => $value) {
                echo "<tr><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Aucun argument reçu.</p>";
        }
    }
    ?>
</body>
</html>
