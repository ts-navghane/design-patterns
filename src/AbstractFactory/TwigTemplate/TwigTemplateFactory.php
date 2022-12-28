<?php

declare(strict_types=1);

namespace App\AbstractFactory\TwigTemplate;

use App\AbstractFactory\Interfaces\TemplateInterface;
use App\AbstractFactory\Interfaces\TemplateFactoryInterface;
use App\AbstractFactory\Interfaces\TemplateRendererInterface;
use App\AbstractFactory\Interfaces\TitleTemplateInterface;

class TwigTemplateFactory implements TemplateFactoryInterface
{
    public function createTitleTemplate(): TitleTemplateInterface
    {
        return new TwigTitleTemplate();
    }

    public function createPageTemplate(): TemplateInterface
    {
        return new TwigBaseTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): TemplateRendererInterface
    {
        return new TwigRenderer();
    }
}
