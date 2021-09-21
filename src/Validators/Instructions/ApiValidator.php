<?php

namespace Nidavellir\Trading\Validators\Instructions;

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
        $this->value = str_replace(' ', '', trim($this->value));

        return $this;
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
    public static function validate()
    {
        return (bool) Api::firstWhere('hashcode', $this->value);
    }
}
