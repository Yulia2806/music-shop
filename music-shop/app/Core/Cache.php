<?php
namespace App\Core;

class Cache {

    public static function get($key) {
        $file = __DIR__ . '/../../storage/cache/' . md5($key) . '.cache';

        if (file_exists($file)) {
            return file_get_contents($file);
        }

        return false;
    }

    public static function set($key, $data) {
        $file = __DIR__ . '/../../storage/cache/' . md5($key) . '.cache';

        file_put_contents($file, $data);
    }
}
