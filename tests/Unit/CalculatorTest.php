<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\Calculator\Calculator;
use ArithmeticError;

class CalculatorTest extends TestCase
{
    protected Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator;
    }


    public function test_can_be_instantiable()
    {
        $this->assertInstanceOf(Calculator::class, $this->calculator);
    }

    public function test_souldnt_accept_invalid_expression()
    {
        $this->expectException(ArithmeticError::class);
        $this->calculator->calculate("2AE+23");
    }

    public function test_should_return_a_valid_addition_result()
    {
        $sum = $this->calculator->calculate("2+2");
        $this->assertEquals(4, $sum);
    }

    public function test_should_return_a_valid_substraction_result()
    {
        $diff = $this->calculator->calculate("5-2");
        $this->assertEquals(3, $diff);
    }

    public function test_should_return_a_valid_division_result()
    {
        $quotient = $this->calculator->calculate("10/2");
        $this->assertEquals(5, $quotient);
    }

    public function test_should_return_a_valid_multiplication_result()
    {
        $res = $this->calculator->calculate("10*2");
        $this->assertEquals(20, $res);
    }
}
