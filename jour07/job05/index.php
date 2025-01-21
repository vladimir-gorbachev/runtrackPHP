<?php
session_start();

// Liste des émojis disponibles
$emojiList = [
    '❌', '⭕', '🦅', '👻', '💀', '🐉', '🦁', '🐯', '🦄', '🦋',
    '🌟', '🔥', '🍀', '⚡', '🌈', '🍓', '🍉', '🍒', '🍍', '🥑',
    '🍋', '🥥', '🍇', '🥝', '🍉', '🌵', '🐍', '🐋', '🦊', '🐯',
    '🌹', '🌸', '🌻', '💧', '❄️', '🌙', '🌞', '🦄', '🦋', '🐼',
    '🐨', '🐻', '🐨', '🐻', '🐦', '🐧', '🐥', '🦖', '🦄', '👑'
];

// Initialisation ou réinitialisation de la partie
if (!isset($_SESSION['grid']) || isset($_POST['reset'])) {
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '')); // Grille vide
    $_SESSION['current_player'] = 'X'; // Joueur X commence
    $_SESSION['players'] = ['X' => '❌', 'O' => '⭕']; // Émojis par défaut
    $_SESSION['message'] = '';
}

// Gestion de la sélection des émojis
if (isset($_POST['set_emoji']) && isset($_POST['emoji_X'], $_POST['emoji_O'])) {
    $_SESSION['players']['X'] = htmlspecialchars($_POST['emoji_X']);
    $_SESSION['players']['O'] = htmlspecialchars($_POST['emoji_O']);
    $_SESSION['message'] = "C'est à {$_SESSION['players'][$_SESSION['current_player']]} de jouer !";
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Gestion d'un coup joué
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['row'], $_POST['col'])) {
    $row = (int)$_POST['row'];
    $col = (int)$_POST['col'];

    if ($_SESSION['grid'][$row][$col] === '') {
        $_SESSION['grid'][$row][$col] = $_SESSION['current_player'];
        if (check_winner($_SESSION['grid'], $_SESSION['current_player'])) {
            $_SESSION['message'] = $_SESSION['players'][$_SESSION['current_player']] . ' a gagné !';
        } elseif (is_draw($_SESSION['grid'])) {
            $_SESSION['message'] = 'Match nul !';
        } else {
            $_SESSION['current_player'] = $_SESSION['current_player'] === 'X' ? 'O' : 'X';
            $_SESSION['message'] = "C'est à {$_SESSION['players'][$_SESSION['current_player']]} de jouer !";
        }
    }
}

// Vérification de la victoire
function check_winner($grid, $player) {
    for ($i = 0; $i < 3; $i++) {
        if (($grid[$i][0] === $player && $grid[$i][1] === $player && $grid[$i][2] === $player) ||
            ($grid[0][$i] === $player && $grid[1][$i] === $player && $grid[2][$i] === $player)) {
            return true;
        }
    }
    return ($grid[0][0] === $player && $grid[1][1] === $player && $grid[2][2] === $player) ||
           ($grid[0][2] === $player && $grid[1][1] === $player && $grid[2][0] === $player);
}

// Vérification du match nul
function is_draw($grid) {
    foreach ($grid as $row) {
        if (in_array('', $row)) {
            return false;
        }
    }
    return true;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu du Morpion</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .game-container {
            text-align: center;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-gap: 5px;
            margin: 20px auto;
        }
        .cell {
            width: 100px;
            height: 100px;
            font-size: 48px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            border: 2px solid black;
            cursor: pointer;
        }
        .cell:disabled {
            cursor: not-allowed;
        }
        .message {
            margin: 20px;
            font-size: 24px;
            color: #333;
        }
        .reset, .emoji-form button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="game-container">
        <?php if (!isset($_POST['set_emoji']) && empty($_SESSION['message'])): ?>
            <!-- Formulaire pour choisir les émojis -->
            <form method="post" class="emoji-form">
                <h2>Choisissez vos émojis :</h2>
                <label>Joueur X : 
                    <select name="emoji_X">
                        <?php foreach ($emojiList as $emoji): ?>
                            <option value="<?= htmlspecialchars($emoji); ?>"><?= $emoji; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>Joueur O : 
                    <select name="emoji_O">
                        <?php foreach ($emojiList as $emoji): ?>
                            <option value="<?= htmlspecialchars($emoji); ?>"><?= $emoji; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button type="submit" name="set_emoji">Commencer la partie</button>
            </form>
        <?php else: ?>
            <!-- Message de statut -->
            <div class="message"><?= htmlspecialchars($_SESSION['message']); ?></div>

            <!-- Grille du morpion -->
            <div class="grid">
                <?php foreach ($_SESSION['grid'] as $rowIndex => $row): ?>
                    <?php foreach ($row as $colIndex => $cell): ?>
                        <form method="post" style="margin: 0;">
                            <input type="hidden" name="row" value="<?= $rowIndex; ?>">
                            <input type="hidden" name="col" value="<?= $colIndex; ?>">
                            <button type="submit" class="cell <?= $cell ? 'disabled' : ''; ?>" 
                                <?= $cell || !empty($_SESSION['message']) ?  : ''; ?>>
                                <?= $cell ? $_SESSION['players'][$cell] : ''; ?>
                            </button>
                        </form>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>

            <!-- Bouton de réinitialisation -->
            <form method="post">
                <button type="submit" name="reset" class="reset">Réinitialiser la partie</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
