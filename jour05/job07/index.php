<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformations de texte</title>
</head>
<body>
    <h1>Formulaire de transformation de texte</h1>
    <form method="post">
        <label for="str">Entrez une chaîne de caractères :</label>
        <input type="text" id="str" name="str" required>
        <br><br>

        <label for="transformation">Choisir une transformation :</label>
        <select name="transformation" id="transformation">
            <option value="gras">Gras (Mots commençant par une majuscule en gras)</option>
            <option value="cesar">César (Décalage de lettres)</option>
            <option value="plateforme">Plateforme (Remplacer 'me' par '_')</option>
        </select>
        <br><br>

        <label for="decalage">Décalage (pour César, par défaut 2) :</label>
        <input type="number" id="decalage" name="decalage" value="2" min="1" step="1">
        <br><br>

        <input type="submit" value="Appliquer la transformation">
    </form>

    <?php
    // Traitement du formulaire
    if (isset($_POST['str']) && isset($_POST['transformation'])) {
        $str = $_POST['str'];
        $transformation = $_POST['transformation'];
        $decalage = isset($_POST['decalage']) ? (int)$_POST['decalage'] : 2; // Valeur par défaut : 2

        // Appliquer la transformation choisie
        if ($transformation == 'gras') {
            // Transformation "gras" : Met les mots commençant par une majuscule en gras
            $words = explode(' ', $str); // Divise la chaîne en mots
            foreach ($words as &$word) {
                if ($word[0] >= 'A' && $word[0] <= 'Z') { // Vérifie si le mot commence par une majuscule
                    $word = "<strong>$word</strong>"; // On le met en gras
                }
            }
            $result = implode(' ', $words); // Recompose la chaîne
        } elseif ($transformation == 'cesar') {
            // Transformation "césar" : Décale les lettres de la chaîne
            $result = '';
            for ($i = 0; $i < strlen($str); $i++) {
                $char = $str[$i];
                if ($char >= 'a' && $char <= 'z') { // Décalage pour les lettres minuscules
                    $result .= chr((ord($char) - 97 + $decalage) % 26 + 97);
                } elseif ($char >= 'A' && $char <= 'Z') { // Décalage pour les lettres majuscules
                    $result .= chr((ord($char) - 65 + $decalage) % 26 + 65);
                } else {
                    $result .= $char; // Les autres caractères restent inchangés
                }
            }
        } elseif ($transformation == 'plateforme') {
            // Transformation "plateforme" : Remplacer "me" à la fin des mots par "_"
            $words = explode(' ', $str); // Divise la chaîne en mots
            foreach ($words as &$word) {
                $length = strlen($word);
                if ($length >= 2 && $word[$length - 2] == 'm' && $word[$length - 1] == 'e') {
                    $word = substr($word, 0, $length - 2) . "_"; // On remplace "me" par "_"
                }
            }
            $result = implode(' ', $words); // Recompose la chaîne
        }

        echo "<h2>Résultat de la transformation :</h2>";
        echo "<p><strong>Original :</strong> $str</p>";
        echo "<p><strong>Transformed :</strong> $result</p>";
    }
    ?>
</body>
</html>
