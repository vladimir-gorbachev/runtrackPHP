<?php
// Démarrer la session
session_start();

// Initialiser la liste des prénoms dans la session si elle n'existe pas
if (!isset($_SESSION['prenoms'])) {
    $_SESSION['prenoms'] = [];
}

// Gestion de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prenom']) && !empty(trim($_POST['prenom']))) {
        // Ajouter le prénom dans la liste
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $_SESSION['prenoms'][] = $prenom;
    }

    if (isset($_POST['reset'])) {
        // Réinitialiser la liste des prénoms
        $_SESSION['prenoms'] = [];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Prénoms</title>
</head>
<body>
    <h1>Liste des Prénoms</h1>
    
    <!-- Formulaire pour ajouter un prénom -->
    <form method="post">
        <label for="prenom">Entrez un prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <button type="submit">Ajouter</button>
    </form>

    <!-- Bouton pour réinitialiser la liste -->
    <form method="post" style="margin-top: 10px;">
        <button type="submit" name="reset">Réinitialiser la liste</button>
    </form>

    <h2>Prénoms enregistrés :</h2>
    <?php
        echo "<ul>";
        foreach ($_SESSION['prenoms'] as $prenom) {
            echo "<li>" . htmlspecialchars($prenom) . "</li>";
            }
            echo "</ul>";
    ?>
</body>
</html>
