<?php

namespace Nidavellir\Trading\Validators\Instructions;

use Nidavellir\Abstracts\Contracts\Validatable;

class IntegrationValidator implements Validatable
{
    private $value;
    private $dataset;

    public function __construct(string $value, array $dataset = [])
    {
        $this->value = $value;
        $this->dataset = $dataset;
    }

    public function parse()
    {
        //
    }

    public function validate()
    {
        /**
         * The integration validator normally doesn't need to call the
         * parse() method since it was already called by the previous
         * instruction validators.
         */
        return true;
    }
}
