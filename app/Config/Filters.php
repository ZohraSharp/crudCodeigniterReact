<?php

namespace Config;

use App\Filters\Cors;

class Filters
{
    public $aliases = [
        'cors' => Cors::class,
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
    ];

    public $globals = [
        'before' => [
            'cors', // Apply CORS filter globally before every request
        ],
        'after'  => [
            'cors',
            //
        ],
    ];

    public $methods = [];
}
