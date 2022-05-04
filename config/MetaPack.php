<?php

/*
|--------------------------------------------------------------------------
| Laravel PHP Facade/Wrapper for the MetaPack Shipping & Tracking API v3
|--------------------------------------------------------------------------
|
| Here is where you can set your token and secret for MetaPack API. In case you do not
| have it, you can read about it on: https://dev.metapack.com/
*/

return [
    'url' => env('METAPACK_URL', ''),
    'key' => env('METAPACK_API_KEY', ''),
    'secret' => env('METAPACK_API_SECRET', ''),
    'carrierServices' => env('METAPACK_CARRIERS', ['']),
];
