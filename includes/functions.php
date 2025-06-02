<?php
/**
 * Fonctions métier de la calculatrice
 */

/**
 * Addition de deux nombres
 * @param float $a Premier nombre
 * @param float $b Deuxième nombre
 * @return float Résultat de l'addition
 */
function additionner($a, $b) {
    return $a + $b;
}

/**
 * Soustraction de deux nombres
 * @param float $a Premier nombre
 * @param float $b Deuxième nombre
 * @return float Résultat de la soustraction
 */
function soustraire($a, $b) {
    return $a - $b;
}

/**
 * Multiplication de deux nombres
 * @param float $a Premier nombre
 * @param float $b Deuxième nombre
 * @return float Résultat de la multiplication
 */
function multiplier($a, $b) {
    return $a * $b;
}

/**
 * Division de deux nombres
 * @param float $a Premier nombre (dividende)
 * @param float $b Deuxième nombre (diviseur)
 * @return float|string Résultat de la division ou message d'erreur
 */
function diviser($a, $b) {
    if ($b == 0) {
        return "Erreur : Division par zéro";
    }
    return $a / $b;
}

/**
 * Calcule le résultat selon l'opération demandée
 * @param float $nombre1 Premier nombre
 * @param float $nombre2 Deuxième nombre
 * @param string $operation Type d'opération (add, sub, mul, div)
 * @return string Message avec le résultat formaté
 */
function calculer($nombre1, $nombre2, $operation) {
    switch($operation) {
        case 'add':
            return "Résultat : $nombre1 + $nombre2 = " . additionner($nombre1, $nombre2);
        case 'sub':
            return "Résultat : $nombre1 - $nombre2 = " . soustraire($nombre1, $nombre2);
        case 'mul':
            return "Résultat : $nombre1 × $nombre2 = " . multiplier($nombre1, $nombre2);
        case 'div':
            return "Résultat : $nombre1 ÷ $nombre2 = " . diviser($nombre1, $nombre2);
        default:
            return "Opération inconnue";
    }
}

/**
 * Valide les données d'entrée
 * @param mixed $nombre1 Premier nombre à valider
 * @param mixed $nombre2 Deuxième nombre à valider
 * @param string $operation Opération à valider
 * @return array Tableau avec 'valid' (bool) et 'error' (string)
 */
function validerEntrees($nombre1, $nombre2, $operation) {
    if (!is_numeric($nombre1) || !is_numeric($nombre2)) {
        return ['valid' => false, 'error' => 'Veuillez entrer des nombres valides'];
    }

    if (!in_array($operation, ['add', 'sub', 'mul', 'div'])) {
        return ['valid' => false, 'error' => 'Opération non supportée'];
    }

    return ['valid' => true, 'error' => ''];
}
?>
