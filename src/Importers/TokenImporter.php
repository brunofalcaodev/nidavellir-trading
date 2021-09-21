<?php

namespace Nidavellir\Trading\Importers;

use Nidavellir\Abstracts\Contracts\Importable;
use Nidavellir\Cube\Models\Token;
use Nidavellir\Jobs\Tokens\ImportTokenJob;
use Nidavellir\Trading\Validators\Models\TokenValidator;

class TokenImporter
{
    public static function __callStatic($method, $args)
    {
        return TokenImporterService::new()->{$method}(...$args);
    }
}

class TokenImporterService implements Importable
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
        ImportTokenJob::dispatch($dataset);
    }
}
