<?php

namespace App\Services\Calculator;

/**
 * Represents the arithmetic minus operations
 */
class Substractor implements OperatorInterface
{
    /**
     * Perform substraction operation on given parameters.
     *
     * @param float $minuend The number to subtract from.
     * @param float $subtrahend The number to subtract.
     *
     * @return float The difference.
     */
    public function calculate(float $minuend, float $subtrahend): float
    {
        return $minuend - $subtrahend;
    }

    /**
     * @return string The minus sign
     */
    public function getSign(): string
    {
        return "-";
    }
}
