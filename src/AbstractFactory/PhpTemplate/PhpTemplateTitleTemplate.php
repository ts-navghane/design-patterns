<?php

declare(strict_types=1);

namespace App\AbstractFactory\PhpTemplate;

use App\AbstractFactory\Interfaces\TitleTemplateInterface;

class PhpTemplateTitleTemplate implements TitleTemplateInterface
{
    public function getTitle(): string
    {
        return "<h1><?= \$title; ?></h1>";
    }
}
