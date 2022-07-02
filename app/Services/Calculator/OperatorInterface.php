<?php

namespace App\Services\Calculator;

/**
 * Represent common behaviors of the arithmetic operations between two numbers
 */
interface OperatorInterface
{
    /**
     * Perform an arithmetic operation on two given numbers.
     *
     * @param float $a The first number.
     * @param float $b The second number.
     *
     * @return float The result of performed operation on the parameters.
     */
    public function calculate(float $a, float $b): float;


    /**
     * Get the arithmetic operation sign (e.g: +, - ...).
     *
     * @return string.
     */
    public function getSign(): string;
}
