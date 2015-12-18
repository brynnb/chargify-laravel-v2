ChargifyV2 Wrapper for Laravel 5 
=====================================

Uses 0.0.5 Chargify SDK

This is a wrapper using the chargley chargify SDK. It creates a service provider and facade for autoloading into laravel.

This differs from the other Chargify Wrapper provided by Andrew Lamers in that it uses V2 of the API. For V1 methods, also use his.

My version relies on my own fork of the PHP SDK that allows you to get the `_data` property of response from `call()`. 
As far as I can tell from the documentation, `call()` is the only way to actually get error messages when using Chargify Direct, and the default implementation of the SDK did not give you access to this protected property. 

Usage
---------------

```php
$response = ChargifyV2::call()->readByChargifyId($callID);
$errorsArray = $response->getData()["response"]["result"]["errors"];
```

Not the most elegant solution but it works and I can't really be bothered to contribute to Chargify's terrible platform more than I need to.

How to Install
---------------

### Laravel 5.0

1.  Install the `brynnb/chargify-laravel` package. Before this works, you also need to add this repository to your composer.json file (since this isn't a registered package).

    ```shell
    $ composer require brynnb/chargify-laravel-v2
    ```

1. Update `config/app.php` to activate ChargifyLaravel

    ```php
    # Add `ChargifyV2LaravelServiceProvider` to the `providers` array
    'providers' => array(
        ...
        brynnb\ChargifyLaravel\ChargifyV2LaravelServiceProvider::class,
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
			'hostname' => env('CHARGIFY_HOSTNAME'),
			'api_key' => env('CHARGIFY_KEY'),
			'shared_key' => env('CHARGIFY_SHARED_KEY'),
			'api_id' => env('CHARGIFY_DIRECT_API_ID'),
			'api_password' => env('CHARGIFY_DIRECT_PASSWORD'),
			'api_secret' => env('CHARGIFY_DIRECT_SECRET'),
    );
    ```

Credits
---------------
This is mostly the work of @andrewlamers, just modified a bit to work for ChargifyV2. Thanks Andrew!
