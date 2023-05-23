<?php

/**
 * ======================================================
 *      THE SYSTEM FILE
 * ======================================================
 * 
 * This is a system file, that is designed to be initiated
 * only when app in development mode
 * 
 * Every logic registered here, will be executed
 * When the command line is action below is commanded
 * 
 * $ php ./cube --system:init
 * 
 * Technically, no gui logic is expected here,
 * Only backend logic is adviced to be registered.
 * 
 * For example creating a database schema.
 * Typically only codes that are required to run just once
 */

/*
use Cube\Modules\DB;
use Cube\Modules\Db\DBTableBuilder;

DB::table('users')->create(function(DBTableBuilder $table){
    $table->field('id')->int()->increment();
    $table->field('username')->varchar();
    $table->field('password')->varchar();
}); */