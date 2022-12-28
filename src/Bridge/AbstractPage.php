<?php

declare(strict_types=1);

namespace App\Bridge;

use App\Bridge\Interfaces\RendererInterface;

abstract class AbstractPage
{
    protected RendererInterface $renderer;

    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function changeRenderer(RendererInterface $renderer): void
    {
        $this->renderer = $renderer;
    }

    abstract public function view(): string;
}
