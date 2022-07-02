<?php

namespace App\Http\Controllers;

use Exception;
use ArithmeticError;
use DivisionByZeroError;
use App\Services\Calculator\Calculator;
use App\Http\Requests\CalculateExpressionRequest;

class CalculatorController extends Controller
{
    /**
     * Perform provided arithmetic operation
     *
     * @param CalculateExpressionRequest $request
     *
     * @return JsonResponse
     *
     * @throws ArithmeticError|DivisionByZeroError|Exception
     */
    public function calculate(CalculateExpressionRequest $request)
    {
        try {
            $expression = $request->validated("expression");
            $result = (new Calculator)->calculate($expression);
            return $this->respondWithsuccess([
                "expression" => $expression,
                "result" => $result
            ]);
        } catch (ArithmeticError | DivisionByZeroError $e) {
            return $this->respondWithError($e->getMessage(), [], 422);
        } catch (Exception $e) {
            return $this->respondWithError();
        }
    }
}
