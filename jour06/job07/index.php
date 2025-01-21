<?php
// Fonction Bubble Sort
function bubblesort(array $tab, bool $croissant = true): array {
    $n = count($tab);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($croissant ? ($tab[$j] > $tab[$j + 1]) : ($tab[$j] < $tab[$j + 1])) {
                $temp = $tab[$j];
                $tab[$j] = $tab[$j + 1];
                $tab[$j + 1] = $temp;
            }
        }
    }
    return $tab;
}

// Initialisation des variables
$result = null;
$inputArray = '';
$selectedOrder = 'asc';

// Traitement du formulaire après soumission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et nettoyer les données du formulaire
    $inputArray = isset($_POST['inputArray']) ? trim($_POST['inputArray']) : '';
    $selectedOrder = isset($_POST['order']) ? $_POST['order'] : 'asc';

    // Convertir la chaîne en tableau
    $array = array_map('trim', explode(',', $inputArray));

    // Appeler la fonction bubblesort
    $isAscending = $selectedOrder === 'asc';
    $result = bubblesort($array, $isAscending);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tri avec Bubble Sort</title>
</head>
<body>
    <h1>Tri d'un tableau avec Bubble Sort</h1>
    <form method="post">
        <label for="inputArray">Entrez un tableau (séparé par des virgules) :</label><br>
        <input type="text" id="inputArray" name="inputArray" value="<?= htmlspecialchars($inputArray) ?>" required>
        <br><br>
        <label>Choisissez l'ordre du tri :</label><br>
        <input type="radio" id="asc" name="order" value="asc" <?= $selectedOrder === 'asc' ? 'checked' : '' ?>>
        <label for="asc">Croissant</label><br>
        <input type="radio" id="desc" name="order" value="desc" <?= $selectedOrder === 'desc' ? 'checked' : '' ?>>
        <label for="desc">Décroissant</label><br><br>
        <button type="submit">Trier</button>
    </form>

    <?php if ($result !== null): ?>
        <h2>Résultat :</h2>
        <p>Tableau trié : <?= implode(', ', $result) ?></p>
    <?php endif; ?>
</body>
</html>
