<?php
namespace App\Core;

class Cache
{
    private static string $path = __DIR__ . '/../../storage/cache/pages/';

    public static function get(string $key): ?string
    {
        $file = self::$path . md5($key) . '.html';

        if (file_exists($file) && (time() - filemtime($file) < 300)) {
            return file_get_contents($file);
        }

        return null;
    }

    public static function set(string $key, string $content): void
    {
        $file = self::$path . md5($key) . '.html';
        file_put_contents($file, $content);
    }
}
