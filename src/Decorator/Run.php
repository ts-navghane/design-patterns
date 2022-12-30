<?php

declare(strict_types=1);

namespace App\Decorator;

use App\Decorator\Interfaces\InputFormatInterface;

class Run
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function display(InputFormatInterface $inputFormat): void
    {
        echo $inputFormat->formatText($this->text);
        echo "\n\n";
    }
}
