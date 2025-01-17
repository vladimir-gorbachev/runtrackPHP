<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertir en Leet Speak</title>
</head>
<body>
    <h1>Convertir une chaîne en Leet Speak</h1>
    <form method="post">
        <label for="str">Entrez une chaîne de caractères :</label>
        <input type="text" id="str" name="str" required>
        <br><br>
        <input type="submit" value="Convertir">
    </form>

    <?php
    // Fonction pour convertir en leet speak
    function toLeetSpeak($str) {
        // Tableau de correspondances de lettres vers leur version en leet speak
        $leet = array(
            'a' => '4', 'A' => '4',
            'b' => '8', 'B' => '8',
            'c' => 'C', 'C' => '(',
            'd' => 'd', 'D' => 'D',
            'e' => '3', 'E' => '3',
            'g' => 'g', 'G' => '6',
            'h' => '#', 'H' => '#',
            'i' => 'i', 'I' => 'i',
            'l' => '1', 'L' => 'l',
            'm' => 'M', 'M' => 'M',
            'o' => '0', 'O' => '0',
            's' => '5', 'S' => '5',
            't' => '7', 'T' => '7'
        );

        // Remplacement des caractères dans la chaîne
        $str = strtr($str, $leet);

        return $str;
    }

    // Traitement du formulaire
    if (isset($_POST['str'])) {
        $chaine = $_POST['str'];
        $chaineLeet = toLeetSpeak($chaine);

        echo "<h2>Chaîne en Leet Speak :</h2>";
        echo "<p>Original : $chaine</p>";
        echo "<p>Leet Speak : $chaineLeet</p>";
    }
    ?>
</body>
</html>
