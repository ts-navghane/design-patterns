<?php

declare(strict_types=1);

namespace App\AbstractFactory\Interfaces;

interface TemplateRendererInterface
{
    public function render(string $templateContent, array $arguments = []): string;
}
