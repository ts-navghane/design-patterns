<?php

declare(strict_types=1);

namespace App\Decorator\Formatter;

class PlainTextFormat extends TextFormat
{
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);
        return strip_tags($text);
    }
}
