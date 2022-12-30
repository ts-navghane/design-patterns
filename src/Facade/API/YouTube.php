<?php

declare(strict_types=1);

namespace App\Facade\API;

class YouTube
{
    public function fetchVideo(): string
    {
        return 'YouTube::fetchVideo()';
    }

    public function saveAs(string $path): void
    {
        return;
    }
}
