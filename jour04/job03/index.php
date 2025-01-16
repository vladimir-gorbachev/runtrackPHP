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

        p {
            font-size: 18px;
            margin-top: 20px;
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

        //filtrer les champs avec les valeurs non vides
        $filteredPost = array_filter($_POST, function($value) {
            return $value !== ""; //exclure les champs vides
        });

        // Compte le nombre d'arguments dans $_POST
        $nbArguments = count($filteredPost);

        // Affiche le nombre d'arguments et les valeurs
        echo "<p>Nombre d'arguments reçus : " . $nbArguments . "</p>";

        // Affiche les clés et les valeurs si des données sont présentes
        if ($nbArguments > 0) {
            echo "<dl>";
            foreach ($_POST as $key => $value) {
                echo "<dt><strong>" . htmlspecialchars($key) . " :</strong> " . htmlspecialchars($value) . "</dt>";
            }
            echo "</dl>";
        } else {
            echo "<p>Aucun argument reçu.</p>";
        }
    }
    ?>
</body>
</html>
