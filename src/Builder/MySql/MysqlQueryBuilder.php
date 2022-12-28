<?php

declare(strict_types=1);

namespace App\Builder\MySql;

use App\Builder\Exception\SqlQueryBuilderException;
use App\Builder\Interfaces\SqlQueryBuilderInterface;
use stdClass;

class MysqlQueryBuilder implements SqlQueryBuilderInterface
{
    protected stdClass $query;

    protected function reset(): void
    {
        $this->query = new stdClass();
    }


    public function select(string $table, array $fields): SqlQueryBuilderInterface
    {
        $this->reset();
        $this->query->base = "SELECT ".implode(", ", $fields)." FROM ".$table;
        $this->query->type = 'select';

        return $this;
    }

    public function where(string $field, string $value, string $operator = '='): SqlQueryBuilderInterface
    {
        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new SqlQueryBuilderException("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }

        $this->query->where[] = "$field $operator '$value'";

        return $this;
    }

    public function limit(int $start, int $offset): SqlQueryBuilderInterface
    {
        if ($this->query->type !== 'select') {
            throw new SqlQueryBuilderException("LIMIT can only be added to SELECT");
        }

        $this->query->limit = " LIMIT ".$start.", ".$offset;

        return $this;
    }

    public function getSQL(): string
    {
        $query = $this->query;
        $sql   = $query->base;

        if (!empty($query->where)) {
            $sql .= " WHERE ".implode(' AND ', $query->where);
        }

        if (isset($query->limit)) {
            $sql .= $query->limit;
        }

        $sql .= ";";

        return $sql;
    }
}
