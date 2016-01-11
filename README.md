ChargifyV2 Wrapper for Laravel 5 
=====================================

Uses 0.1.0 Chargify SDK that uses updated version of guzzle.

This is a wrapper using the chargley chargify SDK. It creates a service provider and facade for autoloading into laravel.

This differs from the other Chargify Wrapper provided by Andrew Lamers in that it uses V2 of the API. For V1 methods, also use his ([or my fork of it](https://github.com/brynnb/chargify-laravel) if you need updated SDK/guzzle).

Usage
---------------

```php
$errorsArray = ChargifyV2::call()->readByChargifyId($callID)["response"]["result"]["errors"];
```


How to Install
---------------

### Laravel 5.0

1.  Install the `brynnb/chargify-laravel-v2` package. Before this works, you also need to add this repository to your composer.json file (since this isn't a registered package).
	```
	"repositories": [
		{
			"type": "vcs",
			"url": "https://github.com/brynnb/chargify-laravel-v2"
		}
		
	]
	```

    then `composer require brynnb/chargify-laravel-v2`
    

1. Update `config/app.php` to activate ChargifyLaravel

    ```php
    # Add `ChargifyV2LaravelServiceProvider` to the `providers` array
    'providers' => array(
        ...
        brynnb\ChargifyV2Laravel\ChargifyV2LaravelServiceProvider::class,
    )

    # Add the `ChargifyV2LaravelFacade` to the `aliases` array
    'aliases' => array(
        ...
        'ChargifyV2' => brynnb\ChargifyV2Laravel\ChargifyV2LaravelFacade::class
    )
    ```

1.  Generate a template Chargify config file

    ```shell
    $ php artisan vendor:publish
    ```

1.  Update your `/.env` file to have the parameters specified in `app/config/chargify.php`:

    ```php
    return array(
			'api_id' => env('CHARGIFY_DIRECT_API_ID'),
			'api_password' => env('CHARGIFY_DIRECT_PASSWORD'),
			'api_secret' => env('CHARGIFY_DIRECT_SECRET')
    );
    ```

Credits
---------------
This is mostly the work of @andrewlamers, just modified a bit to work for ChargifyV2. Thanks Andrew!
