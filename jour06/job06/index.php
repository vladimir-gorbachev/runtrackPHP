<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix du Style</title>
    <?php
    // Inclusion du style CSS sélectionné
    if (isset($_POST['style'])) {
        $style = $_POST['style'];
        if (in_array($style, ['style1', 'style2', 'style3'])) {
            echo "<link rel='stylesheet' href='{$style}.css'>";
        }
    }
    ?>
</head>
<body>
    <h1>Choisissez un style</h1>
    <form method="post">
        <label for="style">Sélectionnez un style :</label>
        <select name="style" id="style">
            <option value="style1">Style 1</option>
            <option value="style2">Style 2</option>
            <option value="style3">Style 3</option>
        </select>
        <br><br>
        <button type="submit">Appliquer le style</button>
    </form>
</body>
</html>
