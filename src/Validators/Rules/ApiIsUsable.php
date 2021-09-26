<?php

namespace Nidavellir\Trading\Validators\Rules;

use Illuminate\Contracts\Validation\Rule;
use Nidavellir\Cube\Models\Api;

class ApiIsUsable implements Rule
{
    public $message;

    public function __construct()
    {
        //
    }

    /**
     * The Api should be usable, meaning:.
     *
     * 1. The user subscription is active (TODO).
     * 2. The api itself is active.
     * 3. The API crawling system is active (TODO).
     *
     * @param  string $attribute
     * @param  string $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $api = Api::firstWhere('hashcode', $value);

        // Api hashcode exists?
        if (! $api) {
            $this->message = 'Unknown api hashcode';

            return false;
        }

        return true;
    }

    public function message()
    {
        return $this->message;
    }
}
