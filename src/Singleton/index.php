<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\Singleton\Config\Config;
use App\Singleton\Logger\Logger;

Logger::log("Started!");

$l1 = Logger::getInstance();
$l2 = Logger::getInstance();

if ($l1 === $l2) {
    Logger::log("Logger has a single instance.");
} else {
    Logger::log("Loggers are different.");
}

$config1  = Config::getInstance();
$login    = "test_login";
$password = "test_password";
$config1->setValue("login", $login);
$config1->setValue("password", $password);

$config2 = Config::getInstance();

if ($login === $config2->getValue("login") && $password === $config2->getValue("password")) {
    Logger::log("Config singleton (\$config2) also works fine.");
}

Logger::log("Finished!");
