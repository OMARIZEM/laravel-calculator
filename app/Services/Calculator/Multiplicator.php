<?php

namespace App\Services\Calculator;

/**
 * Represents the arithmetic multiplication operations
 */
class Multiplicator implements OperatorInterface
{
    /**
     * Perform multiplication operation on given parameters.
     *
     * @param float $multiplicand The number to be multiplied.
     * @param float $multiplier The number to multiply the multiplicand.
     *
     * @return float The result.
     */
    public function calculate(float $multiplicand, float $multiplier): float
    {
        return $multiplicand * $multiplier;
    }

    /**
     * @return string The multiply sign
     */
    public function getSign(): string
    {
        return "*";
    }
}
