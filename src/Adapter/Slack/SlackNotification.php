<?php

declare(strict_types=1);

namespace App\Adapter\Slack;

use App\Adapter\Interfaces\NotificationInterface;

class SlackNotification implements NotificationInterface
{
    private SlackApi $slack;
    private string $chatId;

    public function __construct(SlackApi $slack, string $chatId)
    {
        $this->slack  = $slack;
        $this->chatId = $chatId;
    }

    public function send(string $title, string $message): void
    {
        $slackMessage = "#".$title."# ".strip_tags($message);
        $this->slack->logIn();
        $this->slack->sendMessage($this->chatId, $slackMessage);
    }
}
