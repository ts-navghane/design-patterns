<?php

declare(strict_types=1);

namespace App\Decorator\Input;

use App\Decorator\Interfaces\InputFormatInterface;

class TextInput implements InputFormatInterface
{
    public function formatText(string $text): string
    {
        return $text;
    }
}
