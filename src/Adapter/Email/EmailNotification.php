<?php

declare(strict_types=1);

namespace App\Adapter\Email;

use App\Adapter\Interfaces\NotificationInterface;

class EmailNotification implements NotificationInterface
{
    private string $adminEmail;

    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function send(string $title, string $message): void
    {
        mail($this->adminEmail, $title, $message);
        echo "Sent email with title '$title' to '{$this->adminEmail}' that says '$message'.";
    }
}
