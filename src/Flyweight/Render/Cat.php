<?php

declare(strict_types=1);

namespace App\Flyweight\Render;

class Cat
{
    public string $name;

    public string $age;

    public string $owner;

    private CatVariation $variation;

    public function __construct(string $name, string $age, string $owner, CatVariation $variation)
    {
        $this->name      = $name;
        $this->age       = $age;
        $this->owner     = $owner;
        $this->variation = $variation;
    }

    public function matches(array $query): bool
    {
        foreach ($query as $key => $value) {
            if (property_exists($this, $key)) {
                if ($this->$key !== $value) {
                    return false;
                }
            } elseif (property_exists($this->variation, $key)) {
                if ($this->variation->$key !== $value) {
                    return false;
                }
            } else {
                return false;
            }
        }

        return true;
    }

    public function render(): void
    {
        $this->variation->renderProfile($this->name, $this->age, $this->owner);
    }
}
