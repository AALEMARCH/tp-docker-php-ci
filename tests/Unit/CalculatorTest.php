<?php

namespace Tests\Unit;

use App\Calculator;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * Tests unitaires pour la classe Calculator
 */
class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    /**
     * Setup avant chaque test
     */
    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    /**
     * Test addition simple
     */
    public function testAddition(): void
    {
        $result = $this->calculator->add(2, 3);
        $this->assertEquals(5, $result);
    }

    /**
     * Test addition avec nombres décimaux
     */
    public function testAdditionDecimale(): void
    {
        $result = $this->calculator->add(1.5, 2.5);
        $this->assertEquals(4.0, $result);
    }

    /**
     * Test soustraction
     */
    public function testSoustraction(): void
    {
        $result = $this->calculator->subtract(10, 4);
        $this->assertEquals(6, $result);
    }

    /**
     * Test soustraction avec résultat négatif
     */
    public function testSoustractionNegative(): void
    {
        $result = $this->calculator->subtract(5, 10);
        $this->assertEquals(-5, $result);
    }

    /**
     * Test multiplication
     */
    public function testMultiplication(): void
    {
        $result = $this->calculator->multiply(3, 4);
        $this->assertEquals(12, $result);
    }

    /**
     * Test multiplication par zéro
     */
    public function testMultiplicationParZero(): void
    {
        $result = $this->calculator->multiply(5, 0);
        $this->assertEquals(0, $result);
    }

    /**
     * Test division normale
     */
    public function testDivision(): void
    {
        $result = $this->calculator->divide(15, 3);
        $this->assertEquals(5, $result);
    }

    /**
     * Test division avec décimales
     */
    public function testDivisionDecimale(): void
    {
        $result = $this->calculator->divide(7, 2);
        $this->assertEquals(3.5, $result);
    }

    /**
     * Test division par zéro (doit lever une exception)
     */
    public function testDivisionParZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Division par zéro impossible");

        $this->calculator->divide(10, 0);
    }

    /**
     * Test méthode calculate avec addition
     */
    public function testCalculateAddition(): void
    {
        $result = $this->calculator->calculate(5, 3, 'add');
        $this->assertEquals(8, $result);
    }

    /**
     * Test méthode calculate avec division
     */
    public function testCalculateDivision(): void
    {
        $result = $this->calculator->calculate(20, 4, 'div');
        $this->assertEquals(5, $result);
    }

    /**
     * Test opération inconnue
     */
    public function testOperationInconnue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Opération 'invalid' inconnue");

        $this->calculator->calculate(1, 2, 'invalid');
    }

    /**
     * Test formatage du résultat
     */
    public function testFormatResult(): void
    {
        $formatted = $this->calculator->formatResult(5, 3, 'add', 8);
        $this->assertEquals("Résultat : 5 + 3 = 8", $formatted);
    }

    /**
     * Test formatage division
     */
    public function testFormatResultDivision(): void
    {
        $formatted = $this->calculator->formatResult(10, 2, 'div', 5);
        $this->assertEquals("Résultat : 10 ÷ 2 = 5", $formatted);
    }
}