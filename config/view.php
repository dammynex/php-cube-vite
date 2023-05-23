<?php

/**
 * --------------------------
 * CUBE VIEW CONFIG
 * ---------------------------
 * This file should contain your
 * custom filters and functions
 * that you want available in views
 */

return array(

    #Whether or not app caches views
    'cache' => false,

    #Views cache directory
    'cache_dir' => __DIR__ . '/../.cache/views',

    #Make Cube\Http\Request accessible from view via _req
    'embed_request' => false,
    
    #Functions allowed in views
    'functions' => array(
        'var_dump'
    ),

    #Filters allowed in view
    'filters' => array(
        'hello' => function ($str) {
            return 'Hello world: ' . $str;
        }
    )
);