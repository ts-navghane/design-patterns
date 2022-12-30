<?php

declare(strict_types=1);

namespace App\Decorator\Interfaces;

interface InputFormatInterface
{
    public function formatText(string $text): string;
}
