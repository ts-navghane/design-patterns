<?php

declare(strict_types=1);

namespace App\Facade\API;

class FFMpegVideo
{
    public function filters(): self
    {
        return new self();
    }

    public function resize(): self
    {
        return new self();
    }

    public function synchronize(): self
    {
        return new self();
    }

    public function frame(): self
    {
        return new self();
    }

    public function save(string $path): self
    {
        return new self();
    }
}
