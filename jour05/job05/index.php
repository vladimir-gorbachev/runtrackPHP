<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Occurrences d'un caractère</title>
</head>
<body>
    <h1>Calculez les occurrences d'un caractère dans une chaîne</h1>
    <form method="post">
        <label for="str">Entrez une chaîne de caractères :</label>
        <input type="text" id="str" name="str" required>
        <br><br>

        <label for="char">Entrez un caractère :</label>
        <input type="text" id="char" name="char" maxlength="1" required>
        <br><br>

        <input type="submit" value="Calculer">
    </form>

    <?php
    // Fonction pour gérer les caractères UTF-8 manuellement
    function occurrences($str, $char) {
        $compteur = 0;
        $i = 0;

        // Boucle pour parcourir chaque caractère UTF-8 de la chaîne
        while (isset($str[$i])) {
            $currentChar = '';
            $byte = ord($str[$i]);

            // Vérifier si le caractère est représenté par plusieurs octets (UTF-8)
            if ($byte >= 0xF0) {
                $currentChar = $str[$i] . $str[$i+1] . $str[$i+2] . $str[$i+3];
                $i += 4;
            } elseif ($byte >= 0xE0) {
                $currentChar = $str[$i] . $str[$i+1] . $str[$i+2];
                $i += 3;
            } elseif ($byte >= 0xC0) {
                $currentChar = $str[$i] . $str[$i+1];
                $i += 2;
            } else {
                $currentChar = $str[$i];
                $i++;
            }

            // Comparer le caractère courant au caractère recherché
            if ($currentChar === $char) {
                $compteur++;
            }
        }

        return $compteur;
    }

    // Vérification si le formulaire a été soumis
    if (isset($_POST['str']) && isset($_POST['char'])) {
        $str = $_POST['str'];
        $char = $_POST['char'];

        // Vérifier si l'utilisateur n'a entré qu'un seul caractère UTF-8 valide
        if (strlen($char) > 4) {
            echo "<h2>Erreur : Veuillez entrer un seul caractère.</h2>";
        } else {
            echo "<h2>Le nombre d'occurrences de <i>$char</i> dans '<i>$str</i>' est : " . occurrences($str, $char) . "</h2>";
        }
    }
    ?>
</body>
</html>
