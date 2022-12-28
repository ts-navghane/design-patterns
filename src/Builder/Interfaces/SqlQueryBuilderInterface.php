<?php

declare(strict_types=1);

namespace App\Builder\Interfaces;

interface SqlQueryBuilderInterface
{
    public function select(string $table, array $fields): SqlQueryBuilderInterface;

    public function where(string $field, string $value, string $operator = '='): SqlQueryBuilderInterface;

    public function limit(int $start, int $offset): SqlQueryBuilderInterface;

    public function getSQL(): string;
}
