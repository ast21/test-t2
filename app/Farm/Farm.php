<?php

declare(strict_types=1);

namespace App\Farm;

use App\Farm\Data\AnimalData;
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


            if (!isset($this->products[$name])) {
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


    /**
     * @return AnimalData[]
     */
    public function getAllAnimals(): array
    {
        $data = [];
        foreach ($this->animals as $animal) {
            $name = $animal->getName();

            if (!isset($data[$name])) {
                $data[$name] = new AnimalData(
                    name: $name,
                    count: 1,
                );
                continue;
            }

            $data[$name]->count++;
        }

        return $data;
    }
}