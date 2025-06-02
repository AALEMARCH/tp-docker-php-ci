<?php
// Inclusion des fonctions métier
require_once 'includes/functions.php';

// Configuration de la page
$pageTitle = '🧮 Calculatrice TP PhpStorm';
$resultat = "";
$erreur = "";

// Traitement du formulaire
if ($_POST['nombre1'] ?? false) {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $operation = $_POST['operation'];

    // Validation des entrées
    $validation = validerEntrees($nombre1, $nombre2, $operation);

    if ($validation['valid']) {
        $nombre1 = floatval($nombre1);
        $nombre2 = floatval($nombre2);
        $resultat = calculer($nombre1, $nombre2, $operation);
    } else {
        $erreur = $validation['error'];
    }
}

// Inclusion du header
include 'templates/header.php';
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

<?php
// Inclusion du footer
include 'templates/footer.php';
?>