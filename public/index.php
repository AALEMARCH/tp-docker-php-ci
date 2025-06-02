<?php

// Autoloader Composer
require_once __DIR__ . '/../vendor/autoload.php';

use App\Calculator;

// Configuration de la page
$pageTitle = '🧮 Calculatrice TP PhpStorm avec PHPUnit';
$resultat = "";
$erreur = "";
$calculator = new Calculator();

// Traitement du formulaire
if ($_POST['nombre1'] ?? false) {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $operation = $_POST['operation'];

    try {
        // Validation des entrées
        if (!is_numeric($nombre1) || !is_numeric($nombre2)) {
            throw new InvalidArgumentException('Veuillez entrer des nombres valides');
        }

        if (!in_array($operation, ['add', 'sub', 'mul', 'div'])) {
            throw new InvalidArgumentException('Opération non supportée');
        }

        $nombre1 = floatval($nombre1);
        $nombre2 = floatval($nombre2);

        // Calcul avec la classe Calculator
        $result = $calculator->calculate($nombre1, $nombre2, $operation);
        $resultat = $calculator->formatResult($nombre1, $nombre2, $operation, $result);

    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

// Inclusion du header
include __DIR__ . '/../templates/header.php';
?>

    <!-- Formulaire de calcul -->
    <form method="POST">
        <div class="form-row">
            <input type="number"
                   step="any"
                   name="nombre1"
                   placeholder="Premier nombre"
                   value="<?= htmlspecialchars($_POST['nombre1'] ?? '') ?>"
                   required>
        </div>

        <div class="form-row">
            <select name="operation" required>
                <option value="">Choisir opération</option>
                <option value="add" <?= ($_POST['operation'] ?? '') === 'add' ? 'selected' : '' ?>>
                    Addition (+)
                </option>
                <option value="sub" <?= ($_POST['operation'] ?? '') === 'sub' ? 'selected' : '' ?>>
                    Soustraction (-)
                </option>
                <option value="mul" <?= ($_POST['operation'] ?? '') === 'mul' ? 'selected' : '' ?>>
                    Multiplication (×)
                </option>
                <option value="div" <?= ($_POST['operation'] ?? '') === 'div' ? 'selected' : '' ?>>
                    Division (÷)
                </option>
            </select>
        </div>

        <div class="form-row">
            <input type="number"
                   step="any"
                   name="nombre2"
                   placeholder="Deuxième nombre"
                   value="<?= htmlspecialchars($_POST['nombre2'] ?? '') ?>"
                   required>
        </div>

        <div class="form-buttons">
            <button type="submit">🚀 Calculer</button>
        </div>
    </form>

    <!-- Affichage des résultats -->
<?php if ($resultat): ?>
    <div class="result">
        <?= htmlspecialchars($resultat) ?>
    </div>
<?php endif; ?>

<?php if ($erreur): ?>
    <div class="result" style="background: rgba(255,0,0,0.3);">
        ❌ <?= htmlspecialchars($erreur) ?>
    </div>
<?php endif; ?>

    <div class="info">
        <p>🧪 <strong>Tests :</strong> PHPUnit Framework</p>
        <p>📦 <strong>Dépendances :</strong> Composer</p>
        <p>🏗️ <strong>Architecture :</strong> PSR-4</p>
    </div>

<?php
// Inclusion du footer
include __DIR__ . '/../templates/footer.php';
?>