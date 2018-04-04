<?php
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
