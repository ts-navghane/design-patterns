<?php

declare(strict_types=1);

namespace App\Prototype;

use DateTime;

class Page
{
    private string $title;

    private string $body;

    private Author $author;

    private array $comments = [];

    private DateTime $date;

    public function __construct(string $title, string $body, Author $author)
    {
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
        $this->author->setPage($this);
        $this->date = new DateTime();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function setComment(string $comment): void
    {
        $this->comments[] = $comment;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function __clone()
    {
        $this->title = "Copy of " . $this->title;
        $this->author->setPage($this);
        $this->comments = [];
        $this->date = new DateTime();
    }
}
