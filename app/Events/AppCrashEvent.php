<?php

namespace App\Events;

class AppCrashEvent
{
    public static function handle($args)
    {
        //This will get called when the app crashes on production
        //Do the needful
        //Log to teammates on slack
        //Notify tech lead
        //Do whatever
    }
}