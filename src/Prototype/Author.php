<?php

declare(strict_types=1);

namespace App\Prototype;

class Author
{
    private string $name;

    private array $pages = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPages(): array
    {
        return $this->pages;
    }

    public function setPage(Page $page): void
    {
        $this->pages[] = $page;
    }
}
