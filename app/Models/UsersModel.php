<?php

namespace App\Models;

use Cube\Http\Model;

class UsersModel extends Model
{
    protected static $schema = 'users';

    protected static $fields = array(
        'created_at',
        'updated_at'
    );
}