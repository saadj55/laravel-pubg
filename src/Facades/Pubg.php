<?php

namespace Saadj55\LaravelPubg\Facades;

use Illuminate\Support\Facades\Facade;

class Pubg extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'saadj55.laravelpubg';
    }
}
