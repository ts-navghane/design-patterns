<?php

declare(strict_types=1);

namespace App\ChainOfResponsibility\Middleware;

use App\ChainOfResponsibility\Server\Server;

class UserExistsMiddleware extends Middleware
{
    private Server $server;

    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function check(string $email, string $password): bool
    {
        if (!$this->server->hasEmail($email)) {
            echo 'UserExistsMiddleware: This email is not registered!'.PHP_EOL;

            return false;
        }

        if (!$this->server->isValidPassword($email, $password)) {
            echo 'UserExistsMiddleware: Wrong password!'.PHP_EOL;

            return false;
        }

        return parent::check($email, $password);
    }
}
