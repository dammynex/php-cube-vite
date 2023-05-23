<?php

/**
 * -----------------------------------
 * CUBE Console
 * -----------------------------------
 * Register console commands
 * 'name' => ClassName::class
 */

use App\Commands\HelloWorldCommand;

return array (
    'hello-world' => HelloWorldCommand::class
);