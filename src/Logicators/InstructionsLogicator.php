<?php

namespace Nidavellir\Trading\Logicators;

use Nidavellir\Abstracts\Contracts\Validatable;

class InstructionsLogicator
{
    public static function __callStatic($method, $args)
    {
        return InstructionsLogicatorService::new()->{$method}(...$args);
    }
}

class InstructionsLogicatorService implements Validatable
{
    public function __construct()
    {
        //
    }

    public static function new(...$args)
    {
        return new self(...$args);
    }

    public function validate(array $instructions)
    {
    }

    public function map(string $instruction)
    {
        $map = [
            'api' => ApiValidator::class,
            '',
        ];
    }
}
