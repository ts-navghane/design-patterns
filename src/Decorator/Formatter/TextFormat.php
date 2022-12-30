<?php

declare(strict_types=1);

namespace App\Decorator\Formatter;

use App\Decorator\Interfaces\InputFormatInterface;

class TextFormat implements InputFormatInterface
{
    protected InputFormatInterface $inputFormat;

    public function __construct(InputFormatInterface $inputFormat)
    {
        $this->inputFormat = $inputFormat;
    }

    public function formatText(string $text): string
    {
        return $this->inputFormat->formatText($text);
    }
}
