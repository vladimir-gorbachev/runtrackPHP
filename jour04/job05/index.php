<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
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
    <h1>Formulaire de Connexion</h1>

    <!-- Formulaire de connexion pour envoyer des données via POST -->
    <form action="" method="post">
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>

    <?php
    // Vérifie si des données ont été envoyées via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupère les valeurs du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Vérifie les valeurs de username et password
        if ($username === "John" && $password === "Rambo") {
            echo "<p>C'est pas ma guerre</p>";
        } else {
            echo "<p>Votre pire cauchemar</p>";
        }
    }
    ?>
</body>
</html>
