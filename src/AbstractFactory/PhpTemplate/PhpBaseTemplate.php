<?php

declare(strict_types=1);

namespace App\AbstractFactory\PhpTemplate;

use App\AbstractFactory\AbstractBaseTemplate;

class PhpBaseTemplate extends AbstractBaseTemplate
{
    public function getTemplateContent(): string
    {
        $renderedTitle = $this->titleTemplate->getTitle();

        return <<<HTML
        <div class="page">
            $renderedTitle
            <article class="content"><?= \$content; ?></article>
        </div>
        HTML;
    }
}
