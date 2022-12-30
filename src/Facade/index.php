<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\Facade\Downloader\YouTubeDownloader;

$facade = new YouTubeDownloader("APIKEY-XXXXXXXXX");
$facade->downloadVideo("https://www.youtube.com/watch?v=QH2-TGUlwu4");
