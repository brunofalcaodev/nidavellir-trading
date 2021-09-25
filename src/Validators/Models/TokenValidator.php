<?php

namespace Nidavellir\Trading\Validators\Models;

use Nidavellir\Abstracts\Contracts\Validatable;

class TokenValidator implements Validatable
{
    public function __construct()
    {
        //
    }

    public function parse()
    {
        return $this;
    }

    /**
     * The validation is for upserters, in this case the dataset should
     * have the 'symbol' key in order for the token to be recorded in the
     * tokens database.
     *
     * @param  array  $dataset
     * @return void|\Exception
     */
    public static function validate(array $dataset)
    {
        if (! array_key_exists('symbol', $dataset)) {
            throw new \Exception('symbol field doesnt exist in token importer');
        }
    }
}
