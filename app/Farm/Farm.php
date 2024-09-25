<?php

declare(strict_types=1);

namespace App\Farm;

use App\Farm\Interfaces\AnimalInterface;
use App\Farm\Interfaces\FarmInterface;

/**
 * @property AnimalInterface[] $animals
 */
class Farm implements FarmInterface
{
    protected array $animals = [];
    protected array $countProducts = [];

    public function addAnimal(AnimalInterface $animal): static
    {
        $this->animals[] = $animal;

        return $this;
    }

    public function getProducts(): array
    {
        $products = [];
        foreach ($this->animals as $animal) {
            $products[] = $animal->getProduct();
        }

        return $products;
    }

    public function getCountProducts(): array
    {
        $products = [];
        foreach ($this->animals as $animal) {
            $product = $animal->getProduct();
            $this->countProducts[$product->getName()] = ($this->countProducts[$product->getName()] ?? 0) + 1;
        }

        return $products;
    }

    public function getCountAnimals(): array
    {
        $animals = [];
        foreach ($this->animals as $animal) {
            $animals[$animal->getName()] = ($animals[$animal->getName()] ?? 0) + 1;
        }

        return $animals;
    }
}