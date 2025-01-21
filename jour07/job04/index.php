<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['connexion']) && !empty(trim($_POST['prenom']))) {
        setcookie('prenom', htmlspecialchars(trim($_POST['prenom'])), time() + 604800);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    if (isset($_POST['deco'])) {
        setcookie('prenom', '', time() - 3600);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion avec Cookies</title>
</head>
<body>
    <?php if (!empty($_COOKIE['prenom'])): ?>
        <h1>Bonjour <?= htmlspecialchars($_COOKIE['prenom']); ?> !</h1>
        <form method="post"><button type="submit" name="deco">Déconnexion</button></form>
    <?php else: ?>
        <h1>Connexion</h1>
        <form method="post">
            <input type="text" name="prenom" placeholder="Votre prénom" required>
            <button type="submit" name="connexion">Connexion</button>
        </form>
    <?php endif; ?>
</body>
</html>