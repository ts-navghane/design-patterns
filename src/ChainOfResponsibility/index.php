<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\ChainOfResponsibility\Middleware\RoleCheckMiddleware;
use App\ChainOfResponsibility\Middleware\ThrottlingMiddleware;
use App\ChainOfResponsibility\Middleware\UserExistsMiddleware;
use App\ChainOfResponsibility\Server\Server;

$server = new Server();
$server->register('admin@example.com', 'admin_pass');
$server->register('user@example.com', 'user_pass');

$middleware = new ThrottlingMiddleware(2);
$middleware->linkWith(new UserExistsMiddleware($server))->linkWith(new RoleCheckMiddleware());

$server->setMiddleware($middleware);

do {
    echo PHP_EOL.'Enter your email: ';
    $email = readline();
    echo PHP_EOL.'Enter your password: ';
    $password = readline();
    $success  = $server->logIn($email, $password);
} while (!$success);
