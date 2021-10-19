<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Exchange Rate Provider
    |--------------------------------------------------------------------------
    |
    | This option controls the default exchange rate provider that will be used on various exchange rate transactions.
    | Supported: "free_currency_converter_api"
    |
    */

    'default' => env('EXCHANGE_RATE_PROVIDER', 'free_currency_converter_api'),

    /*
    |--------------------------------------------------------------------------
    | Exchange Rate Providers
    |--------------------------------------------------------------------------
    |
    | Here you may configure the providers information for each services that is used by your application.
    |
    */

    'providers' => [

        'free_currency_converter_api' => [
            'provider' => 'free_currency_converter_api',
            'api_key'  => env('FREE_CURRENCY_CONVERTER_API_KEY'),
            'base_url' => env('FREE_CURRENCY_CONVERTER_API_BASE_URL', 'https://free.currconv.com/api/v8/'),
        ],

    ],

];
