<?php

use Cube\Tools\Auth;
use App\Models\Users;

return array(

    Auth::CONFIG_SCHEMA => 'users',

    Auth::CONFIG_PRIMARY_KEY => 'id',

    Auth::CONFIG_HASH_METHOD => 'password_verify',

    Auth::CONFIG_MODEL => Users::class,

    Auth::CONFIG_ERROR_MSG => 'Invalid account details',

    Auth::CONFIG_COOKIE_EXPIRY_DAYS => 30,
    
    Auth::CONFIG_COMBINATION => array(
        'secret_key' => 'password',
        'fields' => array(
            'username' => null,
            //'email' => 'is_email'
        )
    )
);