<?php

declare(strict_types=1);

namespace App\Adapter\Slack;

class SlackApi
{
    private string $login;
    private string $apiKey;

    public function __construct(string $login, string $apiKey)
    {
        $this->login  = $login;
        $this->apiKey = $apiKey;
    }

    public function logIn(): void
    {
        echo "Logged in to a slack account '{$this->login}' with api key '{$this->apiKey}'.\n";
    }

    public function sendMessage(string $chatId, string $message): void
    {
        echo "Posted following message into the '$chatId' chat: '$message'.\n";
    }
}
