<?php
/**
 *  Laravel Package for PUBG API
 *
 *  Documentation : https://github.com/saadj55/laravel-pubg
 *
 *  Read the README, and the contributing guidelines to contribute to this project.
 *
 *  - Saad Nasir Siddique <saadj55@gmail.com> : https://github.com/saadj55
 */
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
