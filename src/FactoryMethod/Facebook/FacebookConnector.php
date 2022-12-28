<?php

declare(strict_types=1);

namespace App\FactoryMethod\Facebook;

use App\FactoryMethod\Interfaces\SocialNetworkConnectorInterface;

class FacebookConnector implements SocialNetworkConnectorInterface
{
    private string $login;

    private string $password;

    public function __construct(string $login, string $password)
    {
        $this->login    = $login;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Send HTTP API request to log in user $this->login with "."password $this->password\n";
    }

    public function logOut(): void
    {
        echo "Send HTTP API request to log out user $this->login\n";
    }

    public function createPost(string $content): void
    {
        echo "Send HTTP API requests to create a post in Facebook timeline.\n";
        echo $content."\n";
    }
}
