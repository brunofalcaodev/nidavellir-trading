<?php

namespace Nidavellir\Trading\Validators\Instructions;

use Nidavellir\Abstracts\Contracts\Validatable;

class TypeValidator implements Validatable
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
        $this->parse();

        return true;
    }
}
