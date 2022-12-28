<?php

declare(strict_types=1);

namespace App\Singleton;

use App\Singleton\Exception\SingletonException;

class Singleton
{
    private static array $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new SingletonException("Cannot unserialize a singleton.");
    }

    public static function getInstance(): Singleton
    {
        $class = static::class;

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }

    public function showMe(): void
    {
        echo "Hello from Singleton!".PHP_EOL;
    }
}
