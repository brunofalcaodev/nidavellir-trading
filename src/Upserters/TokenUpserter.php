<?php

namespace Nidavellir\Trading\Upserters;

use Nidavellir\Abstracts\Contracts\Importable;
use Nidavellir\Cube\Models\Token;
use Nidavellir\Jobs\Tokens\UpsertTokenJob;
use Nidavellir\Trading\Validators\Models\TokenValidator;

class TokenUpserter
{
    public static function __callStatic($method, $args)
    {
        return TokenUpserterService::new()->{$method}(...$args);
    }
}

class TokenUpserterService implements Importable
{
    public static function new(...$args)
    {
        return new self(...$args);
    }

    public function import(array $dataset)
    {
        // Validate if the token data is eligible to be added to the database.
        TokenValidator::validate($dataset);

        // Trigger job.
        UpsertTokenJob::dispatch($dataset);
    }
}
