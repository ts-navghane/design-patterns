<?php

declare(strict_types=1);

namespace App\AbstractFactory\Interfaces;

interface TemplateInterface
{
    public function getTemplateContent(): string;
}
