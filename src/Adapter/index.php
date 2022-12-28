<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\Adapter\Email\EmailNotification;
use App\Adapter\Slack\SlackApi;
use App\Adapter\Slack\SlackNotification;

echo "Client code is designed correctly and works with email notifications:\n";
$emailNotification = new EmailNotification("tejas-navghane@example.com");
$emailNotification->send(
    "Email: Website is down!",
    "<strong style='color:red;font-size: 50px;'>Alert!</strong> "
    ."Our website is not responding. Call admins and bring it up!"
);

echo "\n\n";


echo "The same client code can work with other classes via adapter:\n";
$slackApi          = new SlackApi("tejas-navghane@example.com", "XXXXXXXX");
$slackNotification = new SlackNotification($slackApi, "#development");
$slackNotification->send(
    "Slack: Website is down!",
    "<strong style='color:red;font-size: 50px;'>Alert!</strong> "
    ."Our website is not responding. Call admins and bring it up!"
);
