<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\Calculator\Adder;
use App\Services\Calculator\Divider;
use App\Services\Calculator\Multiplicator;
use  App\Services\Calculator\Operator;
use App\Services\Calculator\Substractor;
use ArithmeticError;
use DivisionByZeroError;

class OperatorTest extends TestCase
{
    protected Operator $operationContext;

    protected function setUp(): void
    {
        $this->operationContext = new Operator();
    }

    public function test_can_create_new_operation_instance_with_argument()
    {
        $this->assertInstanceOf(Operator::class, new Operator(new Adder()));
    }

    public function test_can_create_new_operation_instance_without_argument()
    {
        $this->assertInstanceOf(Operator::class, new Operator());
    }

    public function test_should_throw_exception_if_no_operation_strategy_specified()
    {
        $this->expectException(ArithmeticError::class);
        $this->operationContext->calculate(2, 2);
    }

    public function test_can_set_the_calculation_strategy()
    {
        $this->operationContext->setOperator(new Adder());
        $this->assertNotNull($this->operationContext->getOperator());
    }


    public function test_can_add_two_numbers()
    {
        $this->operationContext->setOperator(new Adder());
        $sum = $this->operationContext->calculate(2, 2);

        $this->assertEquals(4, $sum);
    }

    public function test_should_return_the_right_plus_operation_sign()
    {
        $addition = new Adder();
        $sign = $addition->getSign();

        $this->assertEquals("+",  $sign);
    }

    public function test_can_substract_two_numbers()
    {
        $this->operationContext->setOperator(new Substractor());
        $diff = $this->operationContext->calculate(5, 2);

        $this->assertEquals(3, $diff);
    }


    public function test_can_multiply_two_numbers()
    {
        $this->operationContext->setOperator(new Multiplicator());
        $product = $this->operationContext->calculate(5, 2);

        $this->assertEquals(10, $product);
    }


    public function test_can_divide_two_numbers_without_error()
    {
        $this->operationContext->setOperator(new Divider());
        $quotient = $this->operationContext->calculate(10, 2);

        $this->assertEquals(5, $quotient);
    }

    public function test_should_throw_division_by_zero_error()
    {
        $this->operationContext->setOperator(new Divider());
        $this->expectException(DivisionByZeroError::class);
        $this->operationContext->calculate(10, 0);
    }
}
