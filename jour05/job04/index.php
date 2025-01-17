<?php
// Fonction calcule sans aucune fonction système intégrée (sauf isset)
function calcule($nombre1, $operation, $nombre2) {
    // Gestion de la valeur absolue (implémentée manuellement)
    function valeur_absolue($nombre) {
        return $nombre < 0 ? -$nombre : $nombre;
    }

    $resultat = 0;

    // Addition
    if ($operation == '+') {
        $resultat = $nombre1;
        for ($i = 0; $i < valeur_absolue($nombre2); $i++) {
            $resultat += ($nombre2 > 0 ? 1 : -1);
        }
        return $resultat;
    }

    // Soustraction
    if ($operation == '-') {
        $resultat = $nombre1;
        for ($i = 0; $i < valeur_absolue($nombre2); $i++) {
            $resultat += ($nombre2 > 0 ? -1 : 1);
        }
        return $resultat;
    }

    // Multiplication
    if ($operation == '*') {
        for ($i = 0; $i < valeur_absolue($nombre2); $i++) {
            $resultat += valeur_absolue($nombre1);
        }
        // Gérer les signes
        if (($nombre1 < 0 && $nombre2 > 0) || ($nombre1 > 0 && $nombre2 < 0)) {
            $resultat = -$resultat;
        }
        return $resultat;
    }

    // Division entière
    if ($operation == '/') {
        if ($nombre2 == 0) {
            return "Erreur : Division par zéro.";
        }
        $dividende = valeur_absolue($nombre1);
        $diviseur = valeur_absolue($nombre2);

        while ($dividende >= $diviseur) {
            $dividende -= $diviseur;
            $resultat++;
        }
        // Gérer les signes
        if (($nombre1 < 0 && $nombre2 > 0) || ($nombre1 > 0 && $nombre2 < 0)) {
            $resultat = -$resultat;
        }
        return $resultat;
    }

    // Modulo
    if ($operation == '%') {
        if ($nombre2 == 0) {
            return "Erreur : Modulo par zéro.";
        }
        $dividende = valeur_absolue($nombre1);
        $diviseur = valeur_absolue($nombre2);

        while ($dividende >= $diviseur) {
            $dividende -= $diviseur;
        }
        // Gérer les signes du résultat
        if ($nombre1 < 0) {
            $dividende = -$dividende;
        }
        return $dividende;
    }

    return "Erreur : Opération non valide.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculette PHP</title>
</head>
<body>
    <h1>Calculette PHP (Sans fonctions intégrées)</h1>
    <form method="post">
        <label for="nombre1">Entrez le premier nombre :</label>
        <input type="number" id="nombre1" name="nombre1" required>
        <br><br>

        <label for="operation">Choisissez une opération (+, -, *, /, %) :</label>
        <input type="text" id="operation" name="operation" maxlength="1" required>
        <br><br>

        <label for="nombre2">Entrez le deuxième nombre :</label>
        <input type="number" id="nombre2" name="nombre2" required>
        <br><br>

        <input type="submit" value="Calculer">
    </form>

    <?php
    // Traitement du formulaire
    if (isset($_POST['nombre1']) && isset($_POST['operation']) && isset($_POST['nombre2'])) {
        // Récupération des valeurs utilisateur
        $nombre1 = $_POST['nombre1'];
        $operation = $_POST['operation'];
        $nombre2 = $_POST['nombre2'];

        // Conversion manuelle des nombres en entiers
        $nombre1 = $nombre1 < 0 ? 0 - (int)($nombre1 * -1) : (int)$nombre1;
        $nombre2 = $nombre2 < 0 ? 0 - (int)($nombre2 * -1) : (int)$nombre2;

        // Appel à la fonction calcule
        $resultat = calcule($nombre1, $operation, $nombre2);
        echo "<h2>Résultat : $resultat</h2>";
    }
    ?>
</body>
</html>
