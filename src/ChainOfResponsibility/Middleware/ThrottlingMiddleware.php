<?php

declare(strict_types=1);

namespace App\ChainOfResponsibility\Middleware;

class ThrottlingMiddleware extends Middleware
{
    private int $requestPerMinute;

    private int $request;

    private int $currentTime;

    public function __construct(int $requestPerMinute)
    {
        $this->requestPerMinute = $requestPerMinute;
        $this->request          = 0;
        $this->currentTime      = time();
    }

    public function check(string $email, string $password): bool
    {
        if (time() > $this->currentTime + 60) {
            $this->request     = 0;
            $this->currentTime = time();
        }

        $this->request++;

        if ($this->request > $this->requestPerMinute) {
            echo 'ThrottlingMiddleware: Request limit exceeded!'.PHP_EOL;
            die();
        }

        return parent::check($email, $password);
    }
}
