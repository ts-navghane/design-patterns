<?php

declare(strict_types=1);

namespace App\Facade\API;

class FFMpeg
{
    public static function create(): FFMpeg
    {
        return new self();
    }

    public function open(string $video): void
    {
        return;
    }
}
