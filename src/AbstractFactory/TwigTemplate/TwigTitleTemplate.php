<?php

declare(strict_types=1);

namespace App\AbstractFactory\TwigTemplate;

use App\AbstractFactory\Interfaces\TitleTemplateInterface;

class TwigTitleTemplate implements TitleTemplateInterface
{
    public function getTitle(): string
    {
        return "<h1>{{ title }}</h1>";
    }
}
