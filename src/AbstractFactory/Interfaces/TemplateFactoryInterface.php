<?php

declare(strict_types=1);

namespace App\AbstractFactory\Interfaces;

interface TemplateFactoryInterface
{
    public function createTitleTemplate(): TitleTemplateInterface;

    public function createPageTemplate(): TemplateInterface;

    public function getRenderer(): TemplateRendererInterface;
}
