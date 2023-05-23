<?php

/**
 * -----------------------------------
 * CUBE COMPONENTS
 * -----------------------------------
 * The components file allows you to declare reusable components
 * that will be available system wide via
 * App::getComponent('component_name')
 */

return array(
    'hello_world' => function () {
        return 'Hello world from component "Hello world"';
    }
);