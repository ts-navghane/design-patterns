<?php

declare(strict_types=1);

namespace App\Bridge\Page;

use App\Bridge\AbstractPage;
use App\Bridge\Interfaces\RendererInterface;
use App\Bridge\Product\Product;

class ProductPage extends AbstractPage
{
    protected Product $product;

    public function __construct(RendererInterface $renderer, Product $product)
    {
        parent::__construct($renderer);
        $this->product = $product;
    }

    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle($this->product->getTitle()),
            $this->renderer->renderTextBlock($this->product->getDescription()),
            $this->renderer->renderImage($this->product->getImage()),
            $this->renderer->renderLink("/cart/add/" . $this->product->getId(), "Add to cart"),
            $this->renderer->renderFooter()
        ]);
    }
}
