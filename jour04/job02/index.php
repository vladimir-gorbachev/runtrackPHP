<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test des paramètres GET</title>
    <style>

        html{
            text-align:center;
            justify-content:center;
        }

        form{
            width: 100%;
            align-items:center;
            align-self:center;
        }
    
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
            
        }
        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
            min-width:200px;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color:rgb(242, 255, 156);
        }
    </style>
</head>
<body>  
    <section>
        <h1>Test des paramètres GET</h1>

        <!-- Formulaire pour envoyer des données via GET -->
        <form action="index.php" method="get">
            <label for="prenom" >Prénom:</label>
            <input type="text" id="prenom" name="Prénom" placeholder="titouan"><br><br>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="Nom" placeholder="2Famille"><br><br>
            <label for="age">Âge :</label>
            <input type="number" id="age" name="Âge" placeholder="^^"><br><br>
            <button type="submit">Envoyer</button>
        </form>

        <?php

        if (!empty($_GET)) {
            // echo "<p style='text-align: center;'>Nombre d'arguments reçus : " . count($_GET) . "</p>";
            echo "<table>";
            echo "<thead>";
            echo "<tr><th><p style=text-align: center;>Nombre d'arguments reçus : </p></th><th><p>" . count($_GET) . "</p></th></tr>";
            echo "<tr><th></th><th></th></tr>";
            echo "<tr><th>Argument</th><th>Valeur</th></tr>";
            echo "</thead>";
            echo "<tbody>";

            // Parcourt les arguments GET et les affiche dans un tableau
            foreach ($_GET as $key => $value) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($key) . "</td>";
                echo "<td>" . htmlspecialchars($value) . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p style='text-align: center;'>Aucun argument reçu.</p>";
        }
        ?>
    </section>
</body>
</html>