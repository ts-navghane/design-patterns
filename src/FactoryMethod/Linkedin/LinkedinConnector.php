<?php

declare(strict_types=1);

namespace App\FactoryMethod\Linkedin;

use App\FactoryMethod\Interfaces\SocialNetworkConnectorInterface;

class LinkedinConnector implements SocialNetworkConnectorInterface
{
    private string $email;

    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email    = $email;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Send HTTP API request to log in user $this->email with " .
            "password $this->password\n";
    }

    public function logOut(): void
    {
        echo "Send HTTP API request to log out user $this->email\n";
    }

    public function createPost(string $content): void
    {
        echo "Send HTTP API requests to create a post in LinkedIn timeline.\n";
        echo $content."\n";
    }
}
