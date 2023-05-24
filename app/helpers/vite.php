<?php

use Cube\App\App;
use Cube\App\Directory;
use Cube\Exceptions\AppException;
use Cube\Http\Env;

function vite(string $entry)
{
    $loadBuild = function () use ($entry) {
        $ds = DIRECTORY_SEPARATOR;
        $dir = App::getPath(Directory::PATH_WEBROOT);
        $manifest_dir = concat($dir, $ds, 'dist', $ds, 'manifest.json');

        if (!file_exists($manifest_dir)) {
            throw new AppException('Manifest file not found');
        }

        $manifest_content = json_decode(file_get_contents($manifest_dir));
        $main = $manifest_content->{$entry};
        $content = array();

        $content[] = h('script', [
            'type' => 'module',
            'src' => url(['dist', $main->file])
        ]);

        every($main->css, function ($path) use (&$content) {
            $content[] = h('link', [
                'rel' => 'stylesheet',
                'href' => url(['dist', $path])
            ]);
        });

        return implode("\n", $content);
    };

    if (App::isProduction()) {
        return $loadBuild();
    }

    if (App::isDevelopment()) {
        $port = Env::get('VITE_PORT');
        $local_uri = concat('http://localhost:', $port);

        $content = [];
        $content[] = h('script', [
            'type' => 'module',
            'src' => concat($local_uri, '/', $entry)
        ]);

        $content[] = h('link', [
            'rel' => 'stylesheet',
            'href' => concat($local_uri, '/src/app.css')
        ]);

        return implode("\n", $content);
    }
}
