<?php
// Vérifier si le bouton reset a été cliqué
if (isset($_POST['reset'])) {
    setcookie('nbvisites', 0, time() - 3600); // Supprime le cookie
    $nbvisites = 0;

    // Redirection
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
} else {
    // Incrémenter ou initialiser le cookie nbvisites
    if (!isset($_COOKIE['nbvisites'])) {
        $nbvisites = 1; // Initialiser si le cookie n'existe pas
    } else {
        $nbvisites = $_COOKIE['nbvisites'] + 1; // Incrémenter si le cookie existe
    }
    setcookie('nbvisites', $nbvisites, time() + 3600); // Mettre à jour le cookie (expire dans 1 heure)
}

// Afficher le nombre de visites
echo "Nombre de visites : " . $nbvisites;
?>

<!-- Formulaire avec un bouton reset -->
<form method="post">
    <button type="submit" name="reset">Reset</button>
</form>
