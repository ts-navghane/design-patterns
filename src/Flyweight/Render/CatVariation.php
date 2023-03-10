<?php

declare(strict_types=1);

namespace App\Flyweight\Render;

class CatVariation
{
    public string $breed;

    public string $image;

    public string $color;

    public string $texture;

    public string $fur;

    public string $size;

    public function __construct(
        string $breed,
        string $image,
        string $color,
        string $texture,
        string $fur,
        string $size
    ) {
        $this->breed   = $breed;
        $this->image   = $image;
        $this->color   = $color;
        $this->texture = $texture;
        $this->fur     = $fur;
        $this->size    = $size;
    }

    public function renderProfile(string $name, string $age, string $owner): void
    {
        echo "= $name =\n";
        echo "Age: $age\n";
        echo "Owner: $owner\n";
        echo "Breed: $this->breed\n";
        echo "Image: $this->image\n";
        echo "Color: $this->color\n";
        echo "Texture: $this->texture\n";
    }
}
