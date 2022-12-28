<?php

declare(strict_types=1);

namespace App\FactoryMethod\Instagram;

use App\FactoryMethod\Interfaces\SocialNetworkConnectorInterface;
use App\FactoryMethod\SocialNetworkPoster;

class InstagramPoster extends SocialNetworkPoster
{
    private string $login;
    private string $password;

    public function __construct(string $login, string $password)
    {
        $this->login    = $login;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetworkConnectorInterface
    {
        return new InstagramConnector($this->login, $this->password);
    }
}
