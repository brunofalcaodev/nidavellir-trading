<?php

namespace Nidavellir\Trading\Validators\Instructions;

use Illuminate\Support\Facades\Validator;
use Nidavellir\Abstracts\Contracts\Validatable;
use Nidavellir\Exceptions\ErrorException;
use Nidavellir\Trading\Validators\Rules\ApiIsUsable;

class ApiValidator implements Validatable
{
    private $key;
    private $instructions;

    public function __construct(string $key, array $instructions = [])
    {
        $this->key = $key;
        $this->instructions = $instructions;
    }

    public function parse()
    {
        $this->key = str_replace(' ', '', trim($this->key));
    }

    public function validate()
    {
        $this->parse();

        $validator = Validator::make($this->instructions, [
            'api' => ['required', 'string', new ApiIsUsable],
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            throw new ErrorException($error, $this->instructions);
        }
    }
}
