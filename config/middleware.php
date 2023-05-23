<?php

use App\Middlewares\Authentication;
use App\Middlewares\CsrfMiddleware;

return array(
    'auth' => Authentication::class,
    'csrf' => CsrfMiddleware::class
);