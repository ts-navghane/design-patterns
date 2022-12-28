<?php

declare(strict_types=1);

namespace App\AbstractFactory;

use App\AbstractFactory\Interfaces\TemplateInterface;
use App\AbstractFactory\Interfaces\TitleTemplateInterface;

abstract class AbstractBaseTemplate implements TemplateInterface
{
    protected TitleTemplateInterface $titleTemplate;

    public function __construct(TitleTemplateInterface $titleTemplate)
    {
        $this->titleTemplate = $titleTemplate;
    }
}
