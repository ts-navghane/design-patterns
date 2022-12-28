<?php

declare(strict_types=1);

namespace App\Builder\Postgres;

use App\Builder\Exception\SqlQueryBuilderException;
use App\Builder\Interfaces\SqlQueryBuilderInterface;
use App\Builder\MySql\MysqlQueryBuilder;
use stdClass;

class PostgresQueryBuilder extends MysqlQueryBuilder
{
    public function limit(int $start, int $offset): SqlQueryBuilderInterface
    {
        parent::limit($start, $offset);

        $this->query->limit = " LIMIT " . $start . " OFFSET " . $offset;

        return $this;
    }
}
