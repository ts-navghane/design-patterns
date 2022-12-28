<?php

declare(strict_types=1);

namespace App\FactoryMethod\Linkedin;

use App\FactoryMethod\Interfaces\SocialNetworkConnectorInterface;
use App\FactoryMethod\SocialNetworkPoster;

class LinkedinPoster extends SocialNetworkPoster
{
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email    = $email;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetworkConnectorInterface
    {
        return new LinkedinConnector($this->email, $this->password);
    }
}
