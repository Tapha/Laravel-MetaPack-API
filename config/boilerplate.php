<?php

/*
|--------------------------------------------------------------------------
| Laravel PHP Facade/Wrapper for the Boilerplate Data API v3
|--------------------------------------------------------------------------
|
| Here is where you can set your token and secret for Boilerplate API. In case you do not
| have it, you can read about it on: https://www.Boilerplate.com/developer/v3/api_overview/authentication/
*/

return [
    'baseUrl'	=> env('Boilerplate_BASE_URL') ? env('Boilerplate_BASE_URL') : 'https://www.Boilerplateapi.com/v3/',
    'token'  => env('Boilerplate_TOKEN', 'J2TJ4OQNA5PENREIGBAY1')
];
