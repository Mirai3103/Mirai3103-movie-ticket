<?php

namespace App\Core;

class Logger
{
    private static $logFile = "app.log";
    public static function info(...$message)
    {
        self::write("INFO", implode(" ", $message));
    }

    public static function error(...$message)
    {
        self::write("ERROR", implode(" ", $message));
    }

    private static function write($level, $message)
    {
        $date = date("Y-m-d H:i:s");
        $line = "[$date] [$level] $message\n";
        file_put_contents(self::$logFile, $line, FILE_APPEND);
    }
}