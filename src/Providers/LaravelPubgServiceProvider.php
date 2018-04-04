<?php
namespace Saadj55\LaravelPubg\Providers;

use Illuminate\Support\ServiceProvider;

use Saadj55\LaravelPubg\Pubg;

class LaravelPubgServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            __DIR__.'../config/pubg.php' => config_path('courier.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('LaravelPubg',function(){
            return new Pubg();
        });
    }

}
