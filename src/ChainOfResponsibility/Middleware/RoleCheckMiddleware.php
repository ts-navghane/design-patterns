<?php

declare(strict_types=1);

namespace App\ChainOfResponsibility\Middleware;

class RoleCheckMiddleware extends Middleware
{
    public function check(string $email, string $password): bool
    {
        if ($email === 'admin@example.com') {
            echo 'RoleCheckMiddleware: Hello, admin!'.PHP_EOL;

            return true;
        }

        echo 'RoleCheckMiddleware: Hello, user!'.PHP_EOL;

        return parent::check($email, $password);
    }
}
