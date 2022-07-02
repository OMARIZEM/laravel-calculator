<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ArithmeticExpressionRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Check whether provided string is a valid arithmetic expression
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^\-?[0-9]+(\+|\-|\*|\/)\-?[0-9]+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute should be a valid arithmetic expression';
    }
}
