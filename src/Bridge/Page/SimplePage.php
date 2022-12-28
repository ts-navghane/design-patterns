<?php

declare(strict_types=1);

namespace App\Bridge\Page;

use App\Bridge\AbstractPage;
use App\Bridge\Interfaces\RendererInterface;

class SimplePage extends AbstractPage
{
    protected string $title;
    protected string $content;

    public function __construct(RendererInterface $renderer, string $title, string $content)
    {
        parent::__construct($renderer);
        $this->title   = $title;
        $this->content = $content;
    }

    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle($this->title),
            $this->renderer->renderTextBlock($this->content),
            $this->renderer->renderFooter(),
        ]);
    }
}
