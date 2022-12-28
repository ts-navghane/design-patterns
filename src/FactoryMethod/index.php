<?php

declare(strict_types=1);

use App\FactoryMethod\Facebook\FacebookPoster;
use App\FactoryMethod\Instagram\InstagramPoster;
use App\FactoryMethod\Linkedin\LinkedinPoster;

require_once __DIR__.'/../../vendor/autoload.php';

echo "Testing FacebookConnector:\n";
(new FacebookPoster("tejas_navghane", "******"))
    ->post("Hello from Facebook!");
echo "\n\n";

echo "Testing LinkedinConnector:\n";
(new LinkedinPoster("tejas_navghane@email.com", "******"))
    ->post("Hello from Linkedin!");
echo "\n\n";

echo "Testing InstagramConnector:\n";
(new InstagramPoster("ts-navghane", "******"))
    ->post("Hello from Instagram!");
echo "\n\n";
