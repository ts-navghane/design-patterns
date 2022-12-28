<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\AbstractFactory\PhpTemplate\PhpTemplate;
use App\AbstractFactory\PhpTemplate\PhpTemplateFactory;
use App\AbstractFactory\TwigTemplate\TwigTemplate;
use App\AbstractFactory\TwigTemplate\TwigTemplateFactory;

$phpTemplate = new PhpTemplate('Sample PhpTemplate Title.', 'Sample PhpTemplate Content.');
echo "Testing actual rendering with the PhpTemplate factory:".PHP_EOL;
echo $phpTemplate->render(new PhpTemplateFactory()).PHP_EOL;

$twigTemplate = new TwigTemplate('Sample TwigTemplate Title.', 'Sample TwigTemplate Content.');
echo "Testing actual rendering with the TwigTemplate factory:".PHP_EOL;
echo $twigTemplate->render(new TwigTemplateFactory()).PHP_EOL;
