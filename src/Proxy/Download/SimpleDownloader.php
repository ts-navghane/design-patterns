<?php

declare(strict_types=1);

namespace App\Proxy\Download;

use App\Proxy\Interfaces\DownloaderInterface;

class SimpleDownloader implements DownloaderInterface
{
    public function download(string $url): string
    {
        echo 'Downloading a file from the Internet.'.PHP_EOL;
        $result = file_get_contents($url);
        echo 'Downloaded bytes: '.strlen($result).PHP_EOL;

        return $result;
    }
}
