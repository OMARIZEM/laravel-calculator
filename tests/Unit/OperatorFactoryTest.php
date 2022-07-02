<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Factories\OperatorFactory;
use App\Services\Calculator\Adder;

class OperatorFactoryTest extends TestCase
{
    public function test_can_create_new_operator_instance()
    {
        $operator = OperatorFactory::create("+");

        $this->assertInstanceOf(Adder::class, $operator);
    }
}
