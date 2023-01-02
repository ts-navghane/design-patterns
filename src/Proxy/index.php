<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\Proxy\Download\CachingDownloader;
use App\Proxy\Download\SimpleDownloader;
use App\Proxy\Interfaces\DownloaderInterface;


echo 'Executing client code with real subject: '.PHP_EOL;
$realSubject = new SimpleDownloader();
clientCode($realSubject);

echo 'Executing the same client code with a proxy: '.PHP_EOL;
$proxy = new CachingDownloader($realSubject);
clientCode($proxy);

function clientCode(DownloaderInterface $subject): void
{
    $start = microtime(true);
    $subject->download("https://example.com/");
    $subject->download("https://example.com/");
    echo 'Downloading in: '. (microtime(true) - $start).PHP_EOL;
}
