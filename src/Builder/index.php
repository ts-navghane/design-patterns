<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\Builder\MySql\MysqlQueryBuilder;
use App\Builder\Postgres\PostgresQueryBuilder;
use App\Builder\Repository;

$repo = new Repository();

echo "Testing MySQL query builder:\n";

echo $repo->getSql(new MysqlQueryBuilder());
echo "\n\n";

echo "Testing PostgresSQL query builder:\n";
echo $repo->getSql(new PostgresQueryBuilder());
