<?php

declare(strict_types=1);

namespace App\Farm;

use App\Farm\Data\ProductData;
use App\Farm\Interfaces\AnimalInterface;
use App\Farm\Interfaces\FarmInterface;

/**
 * @property AnimalInterface[] $animals
 * @property ProductData[] $products
 */
class Farm implements FarmInterface
{
    protected array $animals = [];

    protected array $products = [];

    public function addAnimal(AnimalInterface $animal): static
    {
        $this->animals[] = $animal;

        return $this;
    }

    public function harvest(): void
    {
        foreach ($this->animals as $animal) {
            $product = $animal->getProduct();
            $name = $product->getName();


            if (! isset($this->products[$name])) {
                $this->products[$name] = new ProductData(
                    name: $name,
                    count: $product->getCount(),
                    unitMeasure: $product->getUnitMeasure(),
                );
                return;
            }

            $this->products[$name]->count += $product->getCount();
        }
    }

    /**
     * @return ProductData[]
     */
    public function getCollectedProducts(): array
    {
        return $this->products;
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