<?php

declare(strict_types=1);

namespace App\Adapter\Interfaces;

interface NotificationInterface
{
    public function send(string $title, string $message);
}
