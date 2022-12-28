<?php

declare(strict_types=1);

namespace App\AbstractFactory\TwigTemplate;

use App\AbstractFactory\Interfaces\TemplateFactoryInterface;

class TwigTemplate
{
    public string $title;

    public string $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function render(TemplateFactoryInterface $factory): string
    {
        $twigTemplate = $factory->createPageTemplate();

        return $factory->getRenderer()->render(
            $twigTemplate->getTemplateContent(),
            [
                'title'   => $this->title,
                'content' => $this->content,
            ]
        );
    }
}
