# Laravel Boilerplate

Boilerplate API wrapper for Laravel. This package provides a simple interface to Super (awesome) API. Organize Boilerplate integration with expressive, clean PHP.

## Requirements
PHP >= 7.2  
Laravel >= 6.0


## Installation
Laravel Boilerplate uses composer to make installation a breeze.


**Install via composer** 
``` bash
composer require YourName/Boilerplate
```


**Register service provider**
Add the Laravel Boilerplate service provider to your `config/app.php` file in the providers key
```php
'providers' => [
    // ... other providers
    YourName\Boilerplate\BoilerplateServiceProvider::class,
]
```


**Boilerplate facade alias**
Then add the `Boilerplate` facade to your `aliases` key: 'Boilerplate' => YourName\Boilerplate\Facades\Boilerplate::class.  



## Configuration
Configuration can be done via your `.env` file.
```
Boilerplate_BASE_URL=https://www.Boilerplateapi.com/v3/
Boilerplate_TOKEN=xxxxxxx
````
>You may also publish the config file to `config/Boilerplate.pzhp` for editing:
`php artisan vendor:publish --provider="YourName\Boilerplate\BoilerplateServiceProvider"`
 
 
## Usage
Laravel Boilerplate is incredibly intuitive to use. 

### Introduction
Already configured everything and just want to see it in action? Take a look at the example code below.
```php
<?php

namespace App\Http\Controllers;

use Boilerplate;
use App\Http\Controllers\Controller;

class BoilerplateController extends Controller
{
    public function getEvent(int $eventId)
    {
        return response()->json(Boilerplate::event()->get($eventId));
    }
}
```

### Query Building 
The wrapper also provides a convenient way for you to build fairly elaborate Boilerplate API requests.
The following methods return the instance so you can chain more constraints onto the request as required.

#### Expansions
Boilerplate has many models that refer to each other, and often you’ll want to fetch related data along with the primary model you’re querying - 
for example, you’ll want to fetch an event along with organizer.

```php
Boilerplate::event()->expand('organizer')->get($eventId);

```

### Handling Exceptions
The Boilerplate API will return errors as required. I am still looking for a nicer way to handle these exceptions... For the time being, simply wrap your call in a try/catch block.

```php
try {
    
    Boilerplate::event()->publish(1234);
    
} catch(BoilerplateErrorException $e) {
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();
    echo $responseBodyAsString;
}
```

The Boilerplate API is extensive. I've attempted to cover all of the key areas but there are areas that are currently unimplemented.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
