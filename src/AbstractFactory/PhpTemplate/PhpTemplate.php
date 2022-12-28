<?php

declare(strict_types=1);

namespace App\AbstractFactory\PhpTemplate;

use App\AbstractFactory\Interfaces\TemplateFactoryInterface;

class PhpTemplate
{
    public string $title;

    public string $content;

    public function __construct(string $title, string $content)
    {
        $this->title   = $title;
        $this->content = $content;
    }

    public function render(TemplateFactoryInterface $factory): string
    {
        $pageTemplate = $factory->createPageTemplate();

        return $factory->getRenderer()->render(
            $pageTemplate->getTemplateContent(),
            [
                'title'   => $this->title,
                'content' => $this->content,
            ]
        );
    }
}
