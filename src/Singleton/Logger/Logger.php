<?php

declare(strict_types=1);

namespace App\Singleton\Logger;

use App\Singleton\Singleton;

class Logger extends Singleton
{
    private $fileHandle;

    protected function __construct()
    {
        $this->fileHandle = fopen('php://stdout', 'wb');
    }

    public function writeLog(string $message): void
    {
        $date = date('Y-m-d');
        fwrite($this->fileHandle, "$date: $message\n");
    }

    public static function log(string $message): void
    {
        $logger = static::getInstance();
        $logger->writeLog($message);
    }
}
