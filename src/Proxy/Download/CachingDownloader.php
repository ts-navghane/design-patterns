<?php

declare(strict_types=1);

namespace App\Proxy\Download;

use App\Proxy\Interfaces\DownloaderInterface;

class CachingDownloader implements DownloaderInterface
{
    private SimpleDownloader $downloader;

    private array $cache = [];

    public function __construct(SimpleDownloader $downloader)
    {
        $this->downloader = $downloader;
    }

    public function download(string $url): string
    {
        if (!isset($this->cache[$url])) {
            echo "CacheProxy MISS. ";
            $result            = $this->downloader->download($url);
            $this->cache[$url] = $result;
        } else {
            echo "CacheProxy HIT. Retrieving result from cache.\n";
        }

        return $this->cache[$url];
    }
}
