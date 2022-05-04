# Laravel MetaPack

MetaPack API wrapper for Laravel. This package provides a simple interface to Super (awesome) API. Organize MetaPack integration with expressive, clean PHP.

## Requirements
PHP >= 8.0  
Laravel >= 9.0


## Installation
Laravel MetaPack uses composer to make installation a breeze.

**Install via composer** 
``` bash
composer require tapha/MetaPack
```

**Register service provider**
Add the Laravel MetaPack service provider to your `config/app.php` file in the providers key
```php
'providers' => [
    // ... other providers
    tapha\MetaPack\MetaPackServiceProvider::class,
]
```

**MetaPack facade alias**
Then add the `MetaPack` facade to your `aliases` key: 'MetaPack' => tapha\MetaPack\Facades\MetaPack::class

## Configuration
Configuration can be done via your `.env` file.
```
METAPACK_URL=https://api.sbx.metapack.com/
METAPACK_API_KEY=[YOUR API KEY]
METAPACK_API_SECRET=[YOUR API SECRET]
METAPACK_CARRIERS=[YOUR CARRIERS]
````
>You may also publish the config file to `config/MetaPack.pzhp` for editing:
`php artisan vendor:publish --provider="tapha\MetaPack\MetaPackServiceProvider"`
 
 
## Usage
Laravel MetaPack is incredibly intuitive to use. 

### Introduction
Already configured everything and just want to see it in action? Take a look at the example code below.
```php
<?php

namespace App\Http\Controllers;

use MetaPack;
use App\Http\Controllers\Controller;

class MetaPackController extends Controller
{
    public function getConsignment(int $consignmentId)
    {
        return response()->json(MetaPack::consignment()->get($consignmentId));
    }
}
```

### Query Building 
The wrapper also provides a convenient way for you to build fairly elaborate MetaPack API requests.
The following methods return the instance so you can chain more constraints onto the request as required.

### Handling Exceptions
The MetaPack API will return errors as required. I am still looking for a nicer way to handle these exceptions... For the time being, simply wrap your call in a try/catch block.

```php
try {
    
    MetaPack::event()->publish(1234);
    
} catch(MetaPackErrorException $e) {
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();
    echo $responseBodyAsString;
}
```

The MetaPack API is extensive. I've attempted to cover all of the key areas but there are areas that are currently unimplemented.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
