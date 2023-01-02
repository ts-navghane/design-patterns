<?php

declare(strict_types=1);

namespace App\ChainOfResponsibility\Middleware;

abstract class Middleware
{
    private ?Middleware $next = null;

    public function linkWith(Middleware $next): Middleware
    {
        $this->next = $next;

        return $next;
    }

    public function check(string $email, string $password): bool
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->check($email, $password);
    }
}
