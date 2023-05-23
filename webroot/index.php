<?php

/**
 * ----------------------------------------------------
 * Oh why not, Use composer autoloader
 * ----------------------------------------------------
 * Use composer autoload to load dependecies
 * and autoload components
 */
require_once '../vendor/autoload.php';

dd($composer);

/**
 * -----------------------------------------------------
 * Let's start the app.
 * ----------------------------------------------------
 * Retrieve App Instance
 */
$app = require_once __DIR__ . '/../core/app.php';

/**
 * ------------------------------------------------------
 * On your code, get ready, START!!!
 * ------------------------------------------------------
 * Fire the app!
 */

$app->run();
