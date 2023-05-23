<?php

use Cube\App\App;

/**
 * ----------------------------------------------------
 * Create App Instance
 * ----------------------------------------------------
 * Create app instance and set base app directory
 * Getting things ready
 */
$app = new App(
    dirname(__DIR__)
);

return $app;