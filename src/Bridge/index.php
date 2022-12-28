<?php

declare(strict_types=1);


require_once __DIR__.'/../../vendor/autoload.php';

use App\Bridge\Page\ProductPage;
use App\Bridge\Page\SimplePage;
use App\Bridge\Product\Product;
use App\Bridge\Renderer\HTMLRenderer;
use App\Bridge\Renderer\JsonRenderer;

$HTMLRenderer = new HTMLRenderer();
$JSONRenderer = new JsonRenderer();

$page = new SimplePage($HTMLRenderer, "Home", "Welcome to our website!");
echo "HTML view of a simple content page:\n";
echo $page->view();
echo "\n\n";

$page->changeRenderer($JSONRenderer);
echo "JSON view of a simple content page, rendered with the same client code:\n";
echo $page->view();
echo "\n\n";

$page->changeRenderer($HTMLRenderer);
echo "Change again to HTML view of a simple content page, rendered with the same client code:\n";
echo $page->view();
echo "\n\n";

$product = new Product(
    "123",
    "Star Wars, episode1",
    "A long time ago in a galaxy far, far away...",
    "/images/star-wars.jpeg",
    39.95
);

$page = new ProductPage($HTMLRenderer, $product);
echo "HTML view of a product page, same client code:\n";
echo $page->view();
echo "\n\n";

$page->changeRenderer($JSONRenderer);
echo "JSON view of a simple content page, with the same client code:\n";
echo $page->view();
