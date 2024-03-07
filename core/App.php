<?php

namespace App\Core;

use Exception;

// for DI
class App
{
    /**
     *
     * @var array
     */
    protected static $registry = [];
    /**
     *
     * @param  string $key
     * @param  mixed  $value
     */
    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    /**
     *
     * @param  string $key
     */
    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new Exception("No {$key} is bound in the container.");
        }

        return static::$registry[$key];
    }
}
