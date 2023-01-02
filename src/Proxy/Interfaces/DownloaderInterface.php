<?php

declare(strict_types=1);

namespace App\Proxy\Interfaces;

interface DownloaderInterface
{
    public function download(string $url): string;
}
