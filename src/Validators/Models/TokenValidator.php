<?php

namespace Nidavellir\Trading\Validators\Models;

use Nidavellir\Abstracts\Contracts\Validatable;

class TokenValidator implements Validatable
{
    public function __construct()
    {
        //
    }

    public function parse()
    {
        return $this;
    }

    /**
     * Validates the "api" instruction.
     * The hash code should exist in the database, should be active, and
     * also should be part of an active user.
     *
     * @param  string $value
     *
     * @return bool|void
     */
    public static function validate(array $dataset)
    {
        if (! array_key_exists('symbol', $dataset)) {
            throw new \Exception('symbol field doesnt exist in token importer');
        }
    }
}
