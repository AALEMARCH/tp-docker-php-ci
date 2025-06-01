<?php
// Fonctions métier
function additionner($a, $b) {
    return $a + $b;
}

function soustraire($a, $b) {
    return $a - $b;
}

function multiplier($a, $b) {
    return $a * $b;
}

function diviser($a, $b) {
    if ($b == 0) {
        return "Erreur : Division par zéro";
    }
    return $a / $b;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>🧮 Calculatrice TP PhpStorm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .container {
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }
        input, select, button {
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        button {
            background: #ff6b6b;
            color: white;
            cursor: pointer;
        }
        .result {
            background: rgba(255,255,255,0.2);
            padding: 15px;
            margin: 15px 0;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>🧮 Calculatrice TP PhpStorm</h1>

    <?php
    $resultat = "";

    if ($_POST['nombre1'] ?? false) {
        $nombre1 = floatval($_POST['nombre1']);
        $nombre2 = floatval($_POST['nombre2']);
        $operation = $_POST['operation'];

        switch($operation) {
            case 'add':
                $resultat = "Résultat : $nombre1 + $nombre2 = " . additionner($nombre1, $nombre2);
                break;
            case 'sub':
                $resultat = "Résultat : $nombre1 - $nombre2 = " . soustraire($nombre1, $nombre2);
                break;
            case 'mul':
                $resultat = "Résultat : $nombre1 × $nombre2 = " . multiplier($nombre1, $nombre2);
                break;
            case 'div':
                $resultat = "Résultat : $nombre1 ÷ $nombre2 = " . diviser($nombre1, $nombre2);
                break;
        }
    }
    ?>

    <form method="POST">
        <input type="number" step="any" name="nombre1" placeholder="Premier nombre" required>

        <select name="operation" required>
            <option value="">Choisir opération</option>
            <option value="add">Addition (+)</option>
            <option value="sub">Soustraction (-)</option>
            <option value="mul">Multiplication (×)</option>
            <option value="div">Division (÷)</option>
        </select>

        <input type="number" step="any" name="nombre2" placeholder="Deuxième nombre" required>

        <br><br>
        <button type="submit">🚀 Calculer</button>
    </form>

    <?php if ($resultat): ?>
        <div class="result">
            <?= htmlspecialchars($resultat) ?>
        </div>
    <?php endif; ?>

    <hr style="margin: 30px 0; opacity: 0.3;">
    <p>📅 Généré le : <?= date('d/m/Y H:i:s') ?></p>
    <p>🐘 PHP Version : <?= phpversion() ?></p>
    <p>🚀 Statut : Application en ligne avec PhpStorm !</p>
</div>
</body>
</html>