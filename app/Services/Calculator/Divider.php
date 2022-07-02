<?php

namespace App\Services\Calculator;

use DivisionByZeroError;

/**
 * Represents the arithmetic division operations
 */
class Divider implements OperatorInterface
{
    /**
     * Perform division operation on given parameters.
     *
     * @param float $dividend The number to be divided.
     * @param float $divisor The number to devide by.
     *
     * @return float The quotient.
     *
     * @throws DivisionByZeroError
     */
    public function calculate(float $dividend, float $divisor): float
    {
        try {
            return $dividend / $divisor;
        } catch (DivisionByZeroError $e) {
            throw new DivisionByZeroError($e);
        }
    }

    /**
     * @return string The division sign
     */
    public function getSign(): string
    {
        return "/";
    }
}
