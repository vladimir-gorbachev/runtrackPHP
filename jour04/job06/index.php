<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de vérification de nombre</title>
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
    <h1>Vérification du nombre</h1>

    <!-- Formulaire pour envoyer des données via GET -->
    <form action="" method="get">
        <label for="nombre">Entrez un nombre :</label>
        <input type="text" id="nombre" name="nombre" required>

        <button type="submit">Vérifier</button>
    </form>

    <?php
    // Vérifie si un paramètre 'nombre' a été envoyé via GET
    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];

        // Vérifie si la valeur est un nombre
        if (ctype_digit($nombre)) {
            // Vérifie si le nombre est pair ou impair
            if (bcmod($nombre, 2) == 0) {
                echo "<p>Nombre pair</p>";
            } else {
                echo "<p>Nombre impair</p>";
            }
        } else {
            echo "<p>Veuillez entrer un nombre valide.</p>";
        }
    }
    ?>
</body>
</html>
