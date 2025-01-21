<?php
// Initialiser le compteur
$nbvisites = isset($_POST['nbvisites']) ? intval($_POST['nbvisites']) : 0;

// Vérifier si le bouton reset a été cliqué
if (isset($_GET['reset'])) {
    $nbvisites = 0;
    
    // Redirection
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
} else {
    // Incrémenter le compteur si la page est chargée via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nbvisites++;
    }
}

// Afficher le nombre de visites
echo "Nombre de visites : $nbvisites";
?>

<!-- Formulaire pour incrémenter -->
<form method="post">
    <input type="hidden" name="nbvisites" value="<?php echo $nbvisites; ?>">
    <button type="submit">Visiter</button>
</form>

<!-- Formulaire pour réinitialiser -->
<form method="get">
    <input type="hidden" name="reset" value="1">
    <button type="submit">Reset</button>
</form>
