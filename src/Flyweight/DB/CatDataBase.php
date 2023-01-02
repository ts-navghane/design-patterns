<?php

declare(strict_types=1);

namespace App\Flyweight\DB;

use App\Flyweight\Render\Cat;
use App\Flyweight\Render\CatVariation;

class CatDataBase
{
    private array $cats = [];

    private array $variations = [];

    public function addCat(
        string $name,
        string $age,
        string $owner,
        string $breed,
        string $image,
        string $color,
        string $texture,
        string $fur,
        string $size
    ): void {
        $variation    = $this->getVariation($breed, $image, $color, $texture, $fur, $size);
        $this->cats[] = new Cat($name, $age, $owner, $variation);
        echo "CatDataBase: Added a cat ($name, $breed).\n";
    }

    public function getVariation(
        string $breed,
        string $image,
        $color,
        string $texture,
        string $fur,
        string $size
    ): CatVariation {
        $key = $this->getKey(get_defined_vars());

        if (!isset($this->variations[$key])) {
            $this->variations[$key] = new CatVariation($breed, $image, $color, $texture, $fur, $size);
        }

        return $this->variations[$key];
    }

    public function findCat(array $query): ?Cat
    {
        /** @var Cat $cat */
        foreach ($this->cats as $cat) {
            if ($cat->matches($query)) {
                return $cat;
            }
        }
        echo "CatDataBase: Sorry, your query does not yield any results.";
    }

    private function getKey(array $data): string
    {
        return md5(implode("_", $data));
    }
}
