<?php

declare(strict_types=1);

namespace App\AbstractFactory\TwigTemplate;

use App\AbstractFactory\AbstractBaseTemplate;

class TwigBaseTemplate extends AbstractBaseTemplate
{
    public function getTemplateContent(): string
    {
        $renderedTitle = $this->titleTemplate->getTitle();

        return <<<HTML
        <div class="page">
            $renderedTitle
            <article class="content">{{ content }}</article>
        </div>
        HTML;
    }
}
