<?php

return [
    'client_id' => env('PAYPAL_CLIENT_ID', 'your-client-id'),
    'secret' => env('PAYPAL_SECRET', 'your-secret'),
    'settings' => [
        'mode' => env('PAYPAL_MODE', 'sandbox'), // or 'live'
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path('logs/paypal.log'),
        'log.LogLevel' => 'ERROR' // Available options: 'DEBUG', 'INFO', 'WARN' or 'ERROR'
    ],
];
