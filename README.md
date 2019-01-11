# Laravel Package for PUBG API 

A Laravel Package for PUBG Official API

[![Total Downloads](https://poser.pugx.org/saadj55/laravel-pubg/downloads)](https://packagist.org/packages/saadj55/laravel-pubg)
[![License](https://poser.pugx.org/saadj55/laravel-pubg/license)](https://packagist.org/packages/saadj55/laravel-pubg)
## Installation

Require this package with composer.

```shell
composer require saadj55/laravel-pubg
```

## Setup
### Laravel 5.5+ Integration
Package discovery is enabled so need for additional configuration.
### Laravel 5.* Integration
After installation, open ```config/app.php``` and add the following line to ```providers``` key
 ```Saadj55\LaravelPubg\Providers\LaravelPubgServiceProvider::class,``` 
After that, run the following command to publish configuration file.
```shell
php artisan vendor:publish
```

Set your access token in the ```.env``` file as ```PUBG_ACCESS_TOKEN=<access_token>```

Set the region you want to query as ```PUBG_REGION=<region>``` in the ```.env``` file.

Set the platform you want to query as ```PUBG_PLATFORM=<platform>``` in the ```.env``` file

## Usage

You can simply use the API by adding ```use Saadj55\LaravelPubg\Pubg;``` wherever you want to call the API
and making a new instance of the ```Pubg``` class as ```$pubg = new Pubg;```

## API

### getPlayerById

```shell
$pubg = new Pubg;
$player = $pubg->getPlayerById($player_id);
```

### getPlayersByIds

```shell
$pubg = new Pubg;
$player_ids = [1,2,3,4,5];
$player = $pubg->getPlayersByIds($player_ids);
```

### getPlayersByNames

```shell
$pubg = new Pubg;
$player_names = ['foo','bar'];
$player = $pubg->getPlayersByName($player_names);
```

### getMatchById

```shell
$pubg = new Pubg;
$match = $pubg->getMatchById($match_id);
```
By default, region name is set from the ```app/config/pubg.php```. 
If you need to set the region on the fly, You can call ```$pubg->setRegion($region_name)``` before calling any
of the above methods.
You can also call ```$pubg->setPlatform($platform)```





















