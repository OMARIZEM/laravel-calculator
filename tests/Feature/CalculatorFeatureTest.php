<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculatorFeatureTest extends TestCase
{
    public function test_should_return_bad_request_error_when_no_expression_provided()
    {
        $response = $this->withHeaders(["accept" => "application/json"])
            ->post('/api/calculator');
        $response->assertStatus(422);
    }


    public function test_should_return_bad_request_error_when_wrong_expression_format_provided()
    {
        $response = $this->withHeaders(["accept" => "application/json"])
            ->post('/api/calculator', ["expression" => "98+8df"]);
        $response->assertStatus(422);
    }

    public function test_should_return_correct_addition_result()
    {
        $response = $this->withHeaders(["accept" => "application/json"])
            ->post('/api/calculator', ["expression" => "5+6"]);
        $response->assertSimilarJson([
            "success" => true,
            "data" => [
                "expression" => "5+6",
                "result" => 11
            ]
        ]);
    }

    public function test_should_return_correct_substraction_result()
    {
        $response = $this->withHeaders(["accept" => "application/json"])
            ->post('/api/calculator', ["expression" => "30-15"]);
        $response->assertSimilarJson([
            "success" => true,
            "data" => [
                "expression" => "30-15",
                "result" => 15
            ]
        ]);
    }

    public function test_should_return_correct_division_result()
    {
        $response = $this->withHeaders(["accept" => "application/json"])
            ->post('/api/calculator', ["expression" => "30/15"]);
        $response->assertSimilarJson([
            "success" => true,
            "data" => [
                "expression" => "30/15",
                "result" => 2
            ]
        ]);
    }


    public function test_should_return_correct_multiplication_result()
    {
        $response = $this->withHeaders(["accept" => "application/json"])
            ->post('/api/calculator', ["expression" => "10*15"]);
        $response->assertSimilarJson([
            "success" => true,
            "data" => [
                "expression" => "10*15",
                "result" => 150
            ]
        ]);
    }
}
