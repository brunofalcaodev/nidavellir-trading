<?php

namespace Nidavellir\Trading\Validators\Rules;

use Illuminate\Contracts\Validation\Rule;

class ActionWords implements Rule
{
    public function __construct()
    {
        //
    }

    /**
     * The action instruction can have the following words:.
     *
     * buy
     * sell
     *
     * @param  string $attribute
     * @param  string $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value == 'buy' || $value == 'sell';
    }

    public function message()
    {
        return 'Action can only be: buy or sell';
    }
}
