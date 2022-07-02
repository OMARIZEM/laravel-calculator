<?php

namespace App\Factories;

use App\Services\Calculator\Adder;
use App\Services\Calculator\Divider;
use App\Services\Calculator\Multiplicator;
use App\Services\Calculator\Substractor;
use App\Services\Calculator\OperatorInterface;
use Exception;

/**
 * Create operators instances based on their arithmetic signs
 */
class OperatorFactory
{

    /**
     * @var $operators
     */
    private static $operators = [
        Adder::class,
        Substractor::class,
        Multiplicator::class,
        Divider::class,
    ];

    /**
     * @return OperatorInterface A New operator instance
     */
    public static function create(string $sign): OperatorInterface
    {
        $_operator = null;

        // search operators by their sign
        foreach (self::$operators as $operator) {

            $operatorInstance = new $operator;
            if ($operatorInstance?->getSign() === $sign) {
                $_operator = $operatorInstance;
                break;
            }
        }

        if ($_operator instanceof OperatorInterface) return $_operator;
        else throw new Exception("Invalid operator");
    }
}
