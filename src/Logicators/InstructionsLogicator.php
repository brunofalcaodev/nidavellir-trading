<?php

namespace Nidavellir\Trading\Logicators;

use Nidavellir\Abstracts\Contracts\Logicatable;
use Nidavellir\Trading\Validators\Instructions\ActionValidator;
use Nidavellir\Trading\Validators\Instructions\AmountValidator;
use Nidavellir\Trading\Validators\Instructions\ApiValidator;
use Nidavellir\Trading\Validators\Instructions\PriceValidator;
use Nidavellir\Trading\Validators\Instructions\TokenValidator;

class InstructionsLogicator
{
    public static function __callStatic($method, $args)
    {
        return InstructionsLogicatorService::new()->{$method}(...$args);
    }
}

class InstructionsLogicatorService implements Logicatable
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
        foreach ($instructions as $key => $value) {
            (new ($this->map($key))($key, $instructions))->validate();
        }
    }

    public function map(string $key)
    {
        $map = [
            'api'    => ApiValidator::class,
            'action' => ActionValidator::class,
            'amount' => AmountValidator::class,
            'token'  => TokenValidator::class,
            'price'  => PriceValidator::class,
        ];

        return $map[$key];
    }
}
