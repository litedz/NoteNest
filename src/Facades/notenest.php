<?php

namespace App\notenest\notenest\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\notenest\notenest\notenest
 */
class notenest extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\notenest\notenest\notenest::class;
    }
}
