<?php

declare(strict_types=1);

namespace App\Builder;

use App\Builder\Interfaces\SqlQueryBuilderInterface;

class Repository
{
    public function getSql(SqlQueryBuilderInterface $builder): string
    {
        return $builder
            ->select("users", ["name", "email", "password"])
            ->where("age", "18", ">")
            ->where("age", "30", "<")
            ->limit(10, 20)
            ->getSQL();
    }
}
