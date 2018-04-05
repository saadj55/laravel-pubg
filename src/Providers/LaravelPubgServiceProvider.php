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
namespace Saadj55\LaravelPubg\Providers;

use Illuminate\Support\ServiceProvider;

use Saadj55\LaravelPubg\Pubg;

class LaravelPubgServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('pubg.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('LaravelPubg',function(){
            return new Pubg();
        });
    }

}
