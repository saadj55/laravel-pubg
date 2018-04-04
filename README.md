# Laravel Package for PUBG API 

A Laravel Package for PUBG Official API

## Installation

Require this package with composer.

```shell
composer require saadj55/laravel-pubg
```

## Setup

After installation, open ```config/app.php``` and add the following line to ```providers``` key
 ```Saadj55\LaravelPubg\Providers\LaravelPubgServiceProvider::class,``` 
After that, run the following command to publish configuration file.
```shell
php artisan vendor:publish
```

Set your access token in the ```.env``` file as ```PUBG_ACCESS_TOKEN=<access_token>```

## Usage

You can simply use the API by adding ```use Saadj55\LaravelPubg\Pubg;``` wherever you want to call the API
and making a new instance of the ```Pubg``` class as ```$pubg = new Pubg;```

