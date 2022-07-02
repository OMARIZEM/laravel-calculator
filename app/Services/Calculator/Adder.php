<?php

namespace App\Services\Calculator;

/**
 * Represents the arithmetic addition operations
 */
class Adder implements OperatorInterface
{
    /**
     * Perform addition operation on given parameters.
     *
     * @param float $augend The first number.
     * @param float $addend The second number.
     *
     * @return float The sum.
     */
    public function calculate(float $augend, float $addend): float
    {
        return $augend + $addend;
    }

    /**
     * @return string The plus sign
     */
    public function getSign(): string
    {
        return "+";
    }
}
