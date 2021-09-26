<?php

namespace Nidavellir\Trading\Logicators;

use Nidavellir\Abstracts\Contracts\Logicatable;
use Nidavellir\Trading\Validators\Instructions\ActionValidator;
use Nidavellir\Trading\Validators\Instructions\AmountValidator;
use Nidavellir\Trading\Validators\Instructions\ApiValidator;
use Nidavellir\Trading\Validators\Instructions\IntegrationValidator;
use Nidavellir\Trading\Validators\Instructions\TokenValidator;
use Nidavellir\Trading\Validators\Instructions\TypeValidator;

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
            'type'  => TypeValidator::class,
            /**
             * The integration validator is special. Basically it will
             * validate the interdependency between instructions and between
             * instruction values. For instance if we have type=limit we need
             * to have a price instruction (TODO). For now only market orders
             * are available.
             */
            'integration' => IntegrationValidator::class,
        ];

        return $map[$key];
    }
}
