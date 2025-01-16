<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maison en ASCII</title>
    <style>
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

        pre {
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Générateur de maison en ASCII</h1>

    <!-- Formulaire pour saisir les dimensions -->
    <form action="" method="get">
        <label for="largeur">Largeur :</label>
        <input type="number" id="largeur" name="largeur" min="2" placeholder="Largeur (min: 2)" required>

        <label for="hauteur">Hauteur :</label>
        <input type="number" id="hauteur" name="hauteur" min="2" placeholder="Hauteur (min: 2)" required>

        <button type="submit">Générer la maison</button>
    </form>

    <?php
    // Vérifie si les paramètres "largeur" et "hauteur" sont présents
    if (isset($_GET['largeur'], $_GET['hauteur'])) {
        $largeur = (int)$_GET['largeur'];
        $hauteur = (int)$_GET['hauteur'];

        // Vérifie que les valeurs sont valides
        if ($largeur >= 2 && $hauteur >= 2) {
            echo "<pre>";

            // Génération du toit
            $milieu = floor(($largeur / 2)-1);
            for ($i = 0; $i <= $milieu; $i++) {
                $espaces = str_repeat(" ", $milieu - $i); // Espaces pour centrer
                $toit = "/" . str_repeat("_", $i * 2) . "\\"; // Lignes du toit
                echo $espaces . $toit . $espaces . "\n";
            }

            // Génération du corps
            for ($i = 0; $i < $hauteur-1; $i++) {
                $mur = "|" . str_repeat(" ", ($largeur -1) ) . "|"; // Corps avec murs
                echo $mur . "\n";
            }
            echo "|" . str_repeat("_", ($largeur -1) ) . "|";
            echo "</pre>";
            
        } else {
            echo "<p>Veuillez entrer une largeur (≥ 2) et une hauteur (≥ 2).</p>";
        }
    }
    ?>
</body>
</html>
