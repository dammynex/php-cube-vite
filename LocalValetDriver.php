<?php

/**
 * If you're running valet locally,
 * This contains the configuration file for Cube
 */

class LocalValetDriver extends ValetDriver
{
    public function serves($path, $name, $uri)
    {
        return true;
    }

    public function isStaticFile($path, $name, $uri)
    {
        $static_file = $path . '/webroot/' . $uri;

        if(file_exists($static_file)) {
            return $static_file;
        }
    }

    public function frontControllerPath($path, $name, $uri)
    {
        return $path . '/webroot/index.php';
    }
}