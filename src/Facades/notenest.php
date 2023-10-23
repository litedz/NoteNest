<?php

namespace notenest\notenest\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \notenest\notenest\notenest
 */
class notenest extends Facade
{
    protected static function getFacadeAccessor()
    {
        return __DIR__.'/'.notenest::class;
    }
}
