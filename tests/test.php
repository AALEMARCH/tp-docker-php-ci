<?php
// Inclure seulement les fonctions métier
require_once __DIR__ . '/../includes/functions.php';

echo "🧪 === LANCEMENT DES TESTS avec PhpStorm ===\n\n";

$tests_passes = 0;
$tests_total = 0;

// Fonction pour tester et afficher le résultat
function tester($nom, $condition) {
    global $tests_passes, $tests_total;
    $tests_total++;

    echo "Test $tests_total: $nom... ";

    if ($condition) {
        echo "✅ RÉUSSI\n";
        $tests_passes++;
        return true;
    } else {
        echo "❌ ÉCHOUÉ\n";
        return false;
    }
}

// === TESTS UNITAIRES ===

// Test 1: Addition
tester("Addition 2+3=5", additionner(2, 3) === 5);

// Test 2: Soustraction
tester("Soustraction 10-4=6", soustraire(10, 4) === 6);

// Test 3: Multiplication
tester("Multiplication 3×4=12", multiplier(3, 4) === 12);

// Test 4: Division normale
tester("Division 15÷3=5", diviser(15, 3) === 5);

// Test 5: Division par zéro
tester("Division par zéro gérée", diviser(10, 0) === "Erreur : Division par zéro");

// Test 6: Nombres décimaux
tester("Addition décimale 1.5+2.5=4", additionner(1.5, 2.5) === 4.0);

// Test 7: Nombres négatifs
tester("Soustraction négative 5-10=-5", soustraire(5, 10) === -5);

// Test 8: Fonction calculer
tester("Fonction calculer addition", calculer(5, 3, 'add') === "Résultat : 5 + 3 = 8");

// Test 9: Validation entrées
$validation = validerEntrees("abc", "5", "add");
tester("Validation entrées invalides", !$validation['valid']);

echo "\n📊 === RÉSULTATS ===\n";
echo "Tests réussis : $tests_passes/$tests_total\n";

if ($tests_passes === $tests_total) {
    echo "🎉 TOUS LES TESTS PASSENT !\n";
    exit(0); // Code de succès
} else {
    echo "💥 CERTAINS TESTS ÉCHOUENT !\n";
    exit(1); // Code d'erreur
}
?>