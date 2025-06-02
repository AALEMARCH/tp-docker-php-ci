<?php

namespace App;

/**
 * Classe Calculator
 * Gère les opérations mathématiques de base
 */
class Calculator
{
    /**
     * Addition de deux nombres
     * @param float $a Premier nombre
     * @param float $b Deuxième nombre
     * @return float Résultat de l'addition
     */
    public function add(float $a, float $b): float
    {
        return $a + $b;
    }

    /**
     * Soustraction de deux nombres
     * @param float $a Premier nombre
     * @param float $b Deuxième nombre
     * @return float Résultat de la soustraction
     */
    public function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    /**
     * Multiplication de deux nombres
     * @param float $a Premier nombre
     * @param float $b Deuxième nombre
     * @return float Résultat de la multiplication
     */
    public function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    /**
     * Division de deux nombres
     * @param float $a Premier nombre (dividende)
     * @param float $b Deuxième nombre (diviseur)
     * @return float Résultat de la division
     * @throws \InvalidArgumentException Si division par zéro
     */
    public function divide(float $a, float $b): float
    {
        if ($b === 0.0) {
            throw new \InvalidArgumentException("Division par zéro impossible");
        }
        return $a / $b;
    }

    /**
     * Calcule le résultat selon l'opération demandée
     * @param float $a Premier nombre
     * @param float $b Deuxième nombre
     * @param string $operation Type d'opération (add, sub, mul, div)
     * @return float Résultat du calcul
     * @throws \InvalidArgumentException Si opération inconnue
     */
    public function calculate(float $a, float $b, string $operation): float
    {
        return match($operation) {
            'add' => $this->add($a, $b),
            'sub' => $this->subtract($a, $b),
            'mul' => $this->multiply($a, $b),
            'div' => $this->divide($a, $b),
            default => throw new \InvalidArgumentException("Opération '$operation' inconnue")
        };
    }

    /**
     * Formate le résultat pour l'affichage
     * @param float $a Premier nombre
     * @param float $b Deuxième nombre
     * @param string $operation Opération
     * @param float $result Résultat
     * @return string Message formaté
     */
    public function formatResult(float $a, float $b, string $operation, float $result): string
    {
        $symbol = match($operation) {
            'add' => '+',
            'sub' => '-',
            'mul' => '×',
            'div' => '÷',
            default => '?'
        };

        return "Résultat : $a $symbol $b = $result";
    }
}