<?php

declare(strict_types=1);

namespace App\AbstractFactory\PhpTemplate;

use App\AbstractFactory\Interfaces\TemplateInterface;
use App\AbstractFactory\Interfaces\TemplateFactoryInterface;
use App\AbstractFactory\Interfaces\TemplateRendererInterface;
use App\AbstractFactory\Interfaces\TitleTemplateInterface;

class PhpTemplateFactory implements TemplateFactoryInterface
{
    public function createTitleTemplate(): TitleTemplateInterface
    {
        return new PhpTemplateTitleTemplate();
    }

    public function createPageTemplate(): TemplateInterface
    {
        return new PhpBaseTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): TemplateRendererInterface
    {
        return new PhpTemplateRenderer();
    }
}
