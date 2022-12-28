<?php

declare(strict_types=1);

namespace App\FactoryMethod;

use App\FactoryMethod\Interfaces\SocialNetworkConnectorInterface;

abstract class SocialNetworkPoster
{
    abstract public function getSocialNetwork(): SocialNetworkConnectorInterface;

    public function post($content): void
    {
        $network = $this->getSocialNetwork();
        $network->logIn();
        $network->createPost($content);
        $network->logout();
    }
}
