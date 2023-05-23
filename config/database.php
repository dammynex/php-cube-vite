<?php

/**
 * ----------------------------------------
 * Cube database configuration
 * ----------------------------------------
 * Set all database settings
 */

use Cube\Http\Env;

return array(

    /**
     * Database driver
     * 
     * @var string
     */
    'driver' => Env::get('db_driver'),

    /**
     * Database host name
     * 
     * By default: localhost
     * This varies depending on web host/server
     * 
     * @var string
     */
    'hostname' => Env::get('db_hostname'),

    /**
     * Database username
     * 
     * @var string
     */
    'username' => Env::get('db_username'),

    /**
     * Database password
     * 
     * @var string
     */
    'password' => Env::get('db_password'),

    /**
     * Database table name
     * 
     * @var string
     */
    'dbname' => Env::get('db_name'),

    /**
     * Database port
     * 
     * @var int
     */
    'port' => Env::get('db_port'),

    /**
     * Database charset
     * 
     * @var string
     */
    'charset' => Env::get('db_charset')
);