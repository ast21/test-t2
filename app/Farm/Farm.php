<?php

declare(strict_types=1);

namespace App\Farm;

use App\Farm\Data\AnimalData;
use App\Farm\Data\ProductData;
use App\Farm\Interfaces\AnimalInterface;
use App\Farm\Interfaces\FarmInterface;
use Exception;

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
        foreach ($this->animals as $existingAnimal) {
            if (($regNumber = $animal->getRegNumber()) === $existingAnimal->getRegNumber()) {
                throw new Exception("Животное с номером = '$regNumber' уже существует");
            }
        }

        $this->animals[] = $animal;

        return $this;
    }

    public function harvest(): void
    {
        foreach ($this->animals as $animal) {
            $product = $animal->getProduct();
            $key = $animal->getRegNumber();

            if (!isset($this->products[$key])) {
                $this->products[$key] = new ProductData(
                    name: $product->getName(),
                    count: $product->getCount(),
                    unitMeasure: $product->getUnitMeasure(),
                );
                continue;
            }

            $this->products[$key]->count += $product->getCount();
        }
    }

    public function getHarvestStatistics(): array
    {
        return $this->products;
    }

    /**
     * @return ProductData[]
     */
    public function getCollectedProducts(): array
    {
        return collect($this->products)
            ->groupBy('name')
            ->map(fn ($products) => new ProductData(
                name: $products[0]->name,
                count: collect($products)->sum('count'),
                unitMeasure: $products[0]->unitMeasure,
            ))
            ->toArray();
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