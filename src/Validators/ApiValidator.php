<?php

namespace Nidavellir\Trading\Validators;

use Nidavellir\Abstracts\Contracts\Validatable;

class ApiValidator implements Validatable
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function parse()
    {
        return str_replace(' ', '', $this->value);
    }

    /**
     * Validates the "api" instruction.
     * The hash code should exist in the database, should be active, and
     * also should be part of an active user.
     *
     * @param  string $value
     *
     * @return bool
     */
    public static function validate(string $value)
    {
        $value = (new static($value))->parse();

        return !!Api::firstWhere('hashcode', $value);
    }
}
