<?php

namespace GTerrusa\FrontendMedialibrary\Facades;

use Illuminate\Support\Facades\Facade;

class FrontendMedialibrary extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'frontendmedialibrary';
    }
}
