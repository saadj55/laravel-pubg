<?php
return [
    'api_url' => env('PUBG_API_URL', 'https://api.pubg.com/shards/'),
    'access_token'   => env('PUBG_ACCESS_TOKEN'),
    'region'   => env('PUBG_REGION', 'eu'),
    'platform'   => env('PUBG_PLATFORM', 'steam'),
];