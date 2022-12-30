<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\Composite\Run;

$run = new Run();

$form = $run->getProductForm();
$run->loadProductData($form);
$run->renderProduct($form);
